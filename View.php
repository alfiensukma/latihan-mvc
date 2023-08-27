<?php
class View
{
    function beranda($data)
    {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Latihan - MVC</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body>
            <div class="container">
                <div class="row justify-content-center mt-4">
                    <div class="col-auto">
                        <h1 class="text-center">Latihan - MVC</h1>
                    </div>
                </div>


                <div class="d-flex justify-content-start align-items-center mt-4">
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                        Tambah Data
                    </button>
                </div>

                <div class="row mt-2 shadow p-2  rounded-3">

                    <div class="col-12">
                        <table class="table table-responsive table-striped table-hover mt-3">
                            <thead class="text-center">
                                <tr class="table-primary">
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Angkatan</th>
                                    <th>Prodi</th>
                                    <th>Kelas</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <?php
                            if (!empty($data)) {
                                foreach ($data as $key) {
                            ?>
                                    <tr>
                                        <td><?php echo $key['nim']; ?></td>
                                        <td><?php echo $key['nama']; ?></td>
                                        <td><?php echo $key['angkatan']; ?></td>
                                        <td><?php echo $key['prodi']; ?></td>
                                        <td><?php echo $key['kelas']; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-<?php echo $key['nim']; ?>"> Edit </button>
                                                <form method="post" action="index.php?aksi=delete">
                                                    <input type="hidden" name="id" value="<?php echo $key['nim']; ?>">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center">Data tidak ada</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>

            </div>

            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="index.php?aksi=create">
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <div class="form-group">
                                            <label for="nim">NIM</label>
                                            <input type="number" class="form-control" id="nim" name="nim">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Siswa</label>
                                            <input type="text" class="form-control" id="nama" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="angkatan">Angkatan</label>
                                            <input type="text" class="form-control" id="angkatan" name="angkatan">
                                        </div>
                                        <div class="form-group">
                                            <label for="prodi">Prodi</label>
                                            <input type="text" class="form-control" id="prodi" name="prodi">
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Kelas</label>
                                            <input type="text" class="form-control" id="kelas" name="kelas">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            foreach ($data as $key) {
            ?>
                <div class="modal fade" id="edit-<?php echo $key['nim']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="index.php?aksi=update">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Siswa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <input type="hidden" name="nim_lama" value="<?php echo $key['nim']; ?>">
                                            <div class="form-group">
                                                <label for="editNIM">NIM</label>
                                                <input type="number" class="form-control" id="editNIM" name="nim_baru" value="<?php echo $key['nim']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="editNama">Nama Siswa</label>
                                                <input type="text" class="form-control" id="editNama" name="nama" value="<?php echo $key['nama']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="editAngkatan">Angkatan</label>
                                                <input type="text" class="form-control" id="editAngkatan" name="angkatan" value="<?php echo $key['angkatan']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="editProdi">Prodi</label>
                                                <input type="text" class="form-control" id="editProdi" name="prodi" value="<?php echo $key['prodi']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="editKelas">Kelas</label>
                                                <input type="text" class="form-control" id="editKelas" name="kelas" value="<?php echo $key['kelas']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutuo</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

        </body>

        </html>
<?php
    }
}
?>