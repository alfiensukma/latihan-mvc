<?php

class Model{
    private $conn;

    function __construct(){
        $this->conn  =new mysqli('localhost', 'root', '', 'latihan_mvc'); //membuat koneksi db
    }

    function read(){
        $stmt = $this->conn->query("SELECT * FROM mahasiswa"); //membaca tabel
        $result = $stmt->fetch_all(MYSQLI_ASSOC); //mengambil semua hasil dalam bentuk array asosiatif
        $this->conn->close(); //menutup koneksi db
        return $result;
    }

    function insert($nim, $nama, $angkatan, $prodi, $kelas){
        $stmt = $this->conn->prepare("INSERT INTO mahasiswa (nim, nama, angkatan, prodi, kelas) VALUE(?,?,?,?,?)"); //menyiapkan query untuk memasukkan data baru
        $stmt->bind_param('issss', $nim, $nama, $angkatan, $prodi, $kelas); //mengikat parameter ke statement yang telah disiapkan
        $stmt->execute(); //menjalankan pernyataan untuk menyisipkan data
        $stmt->close(); //menutup pernyataan
        $this->conn->close();
    }

    function update($nim_baru, $nim_lama, $nama, $angkatan, $prodi, $kelas){
        $stmt = $this->conn->prepare("UPDATE mahasiswa SET nim=?, nama=?, angkatan=?, prodi=?, kelas=? WHERE nim=?"); //menyiapkan query untuk memperbaharui data
        $stmt->bind_param('issssi', $nim_baru, $nama, $angkatan, $prodi, $kelas, $nim_lama);
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
    }

    function delete($nim){
        $stmt = $this->conn->prepare("DELETE FROM mahasiswa WHERE nim = ?");
        $stmt->bind_param("i", $nim);
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
    }
}

?>