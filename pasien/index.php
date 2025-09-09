<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/all.css">
</head>

<body style="background-color: #ECECBB;">
    <?php
    include('../navbar.php');
    ?>

    <div class="container">
        <!-- Konten -->
        <div class="row">
            <div class="col-8 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        Data Pasien
                    </div>
                    <div class="card-body">
                        <a href="form.php" class="btn btn-primary mt-3">Tambah Data</a>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi
                                include('../koneksi.php');

                                #2. menuliskan query
                                $qry    = "SELECT * FROM pasien";

                                #3. menjalankan query
                                $result = mysqli_query($koneksi, $qry);

                                #4. melakukan looping data pasien
                                $nomor  = 1;
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $nomor++ ?></th>
                                        <td><?= $row['Nama_pasienKlinik'] ?></td>
                                        <td><?= $row['Tanggal_LahirPasien'] ?></td>
                                        <?php

                                        ?>
                                        <td><?= $row['Jenis_kelaminPasien'] ?></td>
                                        <td><?= $row['Alamat_Pasien'] ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="edit.php?id=<?= $row['pasienKlinik_ID'] ?>"><i class="fa fa-pen-to-square"></i></a>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['pasienKlinik_ID'] ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $row['pasienKlinik_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin data pasien <?= $row['Nama_pasienKlinik'] ?> ingin dihapus?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="hapus.php?id=<?= $row['pasienKlinik_ID'] ?>" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/all.js"></script>
</body>

</html>