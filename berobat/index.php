<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berobat</title>
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
            <div class="col-12 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        Data Berobat
                    </div>
                    <div class="card-body">
                        <a href="form.php" class="btn btn-primary mt-3">Tambah Data</a>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No. Transaksi</th>
                                    <th scope="col">Tanggal Berobat</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Usia </th>
                                    <th scope="col">Jenis Kelamin </th>                                   
                                    <th scope="col">Keluhan</th>
                                    <th scope="col">Nama Poli</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Biaya Adm</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi
                                include('../koneksi.php');

                                #2. menuliskan query
                                $qry    = "SELECT * FROM berobat INNER JOIN pasien ON berobat.PasienKlinik_ID = pasien.PasienKlinik_ID INNER JOIN dokter ON berobat.Dokter_ID = dokter.Dokter_ID INNER JOIN poli ON dokter.Poli_ID = poli.Poli_ID";

                                #3. menjalankan query
                                $result = mysqli_query($koneksi, $qry);

                                #4. melakukan looping data pasien
                                $nomor  = 1;
                                foreach ($result as $row) {

                                    //memformat ulang tanggal berobat
                                    $tgl_berobat = date_create($row['Tanggal_Berobat']);
                                    $tgl_berobat = date_format($tgl_berobat, 'd/m/Y');

                                    //membuat usia pasien
                                    $tanggal_lahir = new DateTime($row['Tanggal_LahirPasien']);
                                    $sekarang = new DateTime("today");
                                    $usia = $sekarang->diff($tanggal_lahir)->y;

                                    //memformat biaya menjadi rupiah
                                    $biaya = $row['Biaya_Adm'];
                                    $biaya = number_format($biaya,0,',','.');
                                ?>
                                    <tr>
                                        <th scope="row"><?= $nomor++ ?></th>
                                        <td><?= $row['No_Transaksi'] ?></td>
                                        <td><?= $tgl_berobat?></td>
                                        <td><?= $row['Nama_pasienKlinik'] ?></td>
                                        <td><?= $usia?></td>
                                        <td><?= $row['Jenis_kelaminPasien'] ?></td>
                                        <td><?= $row['Keluhan_Pasien'] ?></td>
                                        <td><?= $row['Nama_Poli'] ?></td>
                                        <td><?= $row['Nama_Dokter'] ?></td>
                                        <td>Rp <?= $biaya?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="edit.php?id=<?= $row['No_Transaksi'] ?>"><i class="fa fa-pen-to-square"></i></a>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['No_Transaksi'] ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $row['No_Transaksi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin data <?= $row['Nama_pasienKlinik'] ?> ingin dihapus?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="hapus.php?id=<?= $row['No_Transaksi'] ?>" class="btn btn-danger">Hapus</a>
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