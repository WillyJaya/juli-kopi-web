<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "stok_opname_db";
    private $conn;

    private $allowed_tables = ['kategori', 'supplier', 'satuan', 'lokasi'];

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }

    public function get_connection() {
        return $this->conn;
    }

    public function tampil_data($search = null) {
        $search = mysqli_real_escape_string($this->conn, $search);
        $query = "SELECT barang.*, kategori.nama_kategori, supplier.nama_supplier, 
                         satuan.nama_satuan, lokasi.nama_lokasi
                  FROM barang
                  LEFT JOIN kategori ON barang.id_kategori = kategori.id_kategori
                  LEFT JOIN supplier ON barang.id_supplier = supplier.id_supplier
                  LEFT JOIN satuan ON barang.id_satuan = satuan.id_satuan
                  LEFT JOIN lokasi ON barang.id_lokasi = lokasi.id_lokasi";

        if (!empty($search)) {
            $query .= " WHERE barang.nama_barang LIKE '%$search%'";
        }

        $result = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function get_by_id($id) {
        $id = intval($id);
        $query = "SELECT * FROM barang WHERE id_barang = $id";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    public function get_barang_by_id($id) {
        $id = intval($id);
        $query = "SELECT barang.*, kategori.nama_kategori, supplier.nama_supplier, 
                         satuan.nama_satuan, lokasi.nama_lokasi
                  FROM barang
                  LEFT JOIN kategori ON barang.id_kategori = kategori.id_kategori
                  LEFT JOIN supplier ON barang.id_supplier = supplier.id_supplier
                  LEFT JOIN satuan ON barang.id_satuan = satuan.id_satuan
                  LEFT JOIN lokasi ON barang.id_lokasi = lokasi.id_lokasi
                  WHERE barang.id_barang = $id";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    public function tambah_data($nama, $stok, $beli, $jual, $gambar, $id_kategori, $id_supplier, $id_satuan, $id_lokasi) {
        $nama = mysqli_real_escape_string($this->conn, $nama);
        $gambar = mysqli_real_escape_string($this->conn, $gambar);

        $query = "INSERT INTO barang (
                      nama_barang, stok, harga_beli, harga_jual, gambar,
                      id_kategori, id_supplier, id_satuan, id_lokasi
                  ) VALUES (
                      '$nama', '$stok', '$beli', '$jual', '$gambar',
                      '$id_kategori', '$id_supplier', '$id_satuan', '$id_lokasi'
                  )";

        return mysqli_query($this->conn, $query);
    }

    public function update_data($nama, $stok, $beli, $jual, $gambar, $id_kategori, $id_supplier, $id_satuan, $id_lokasi, $id_barang) {
        $nama = mysqli_real_escape_string($this->conn, $nama);
        $gambar = mysqli_real_escape_string($this->conn, $gambar);
        $id_barang = intval($id_barang);

        $query = "UPDATE barang 
                  SET nama_barang='$nama', stok='$stok', harga_beli='$beli', harga_jual='$jual', 
                      gambar='$gambar', id_kategori='$id_kategori',
                      id_supplier='$id_supplier', id_satuan='$id_satuan', id_lokasi='$id_lokasi'
                  WHERE id_barang='$id_barang'";

        return mysqli_query($this->conn, $query);
    }

    public function delete_data($id) {
        $id = intval($id);
        $barang = $this->get_by_id($id);

        if ($barang && !empty($barang['gambar'])) {
            $filepath = "uploads/" . $barang['gambar'];
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }

        $query = "DELETE FROM barang WHERE id_barang='$id'";
        return mysqli_query($this->conn, $query);
    }

    public function get_all($table) {
        if (!in_array($table, $this->allowed_tables)) {
            return [];
        }

        $query = mysqli_query($this->conn, "SELECT * FROM `$table`");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function update_stok($id_barang, $stok_baru) {
        $id_barang = intval($id_barang);
        $stok_baru = intval($stok_baru);

        $stmt = mysqli_prepare($this->conn, "UPDATE barang SET stok = ? WHERE id_barang = ?");
        if (!$stmt) return false;

        mysqli_stmt_bind_param($stmt, "ii", $stok_baru, $id_barang);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }
}
?>
