<?php

include "Model.php";
include "View.php";

class Controller{

    function __construct(){
        if (isset($_GET['aksi'])) {
            switch ($_GET['aksi']) {
                case 'create':
                    $this->create();
                    break;
                case 'update':
                    $this->update();
                    break;
                case 'delete':
                    $this->delete();
                    break;
                default:
                    $this->read();
                    break;
            }
        } else {
            $this->read();
        }
    }

    function read(){
        $nRead = new Model();
        $data = $nRead->read();

        $vBeranda = new View();
        $vBeranda->beranda($data);
    }

    function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nCreate = new Model();
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $angkatan = $_POST['angkatan'];
            $prodi = $_POST['prodi'];
            $kelas = $_POST['kelas'];
            $nCreate->insert($nim, $nama, $angkatan, $prodi, $kelas);
        }

        header("Location: index.php");
    }

    function update(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nUpdate = new Model();
            $nim_baru = $_POST['nim_baru'];
            $nim_lama = $_POST['nim_lama'];
            $nama = $_POST['nama'];
            $angkatan = $_POST['angkatan'];
            $prodi = $_POST['prodi'];
            $kelas = $_POST['kelas'];
            $nUpdate->update($nim_baru, $nim_lama, $nama, $angkatan, $prodi, $kelas);
        }

        header("Location: index.php");
    }

    function delete(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nDelete = new Model();
            $id = $_POST['id'];
            $nDelete->delete($id);
        }

        header("Location: index.php");
    }

}

?>