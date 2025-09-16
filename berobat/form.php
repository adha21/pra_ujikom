<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berobat Klinik Sehat</title>
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
                        Form Tambah Data Berobat
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_form.php">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No. Transaksi</label>
                                <input type="text" name="transaksi" placeholder="Masukkan nomor transaksi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">ID Pasien</label>
                                <select name="id_pasien" class="form-select" aria-label="Default select example">
                                    <option selected>- Pilih Pasien -</option>
                                    <?php
                                    include('../koneksi.php');
                                    $qry = mysqli_query($koneksi, "SELECT * FROM pasien");
                                    foreach ($qry as $row) {
                                    ?>
                                        <option value="<?= $row['pasienKlinik_ID'] ?>"><?= $row['Nama_pasienKlinik'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Berobat</label>
                                <div class="row">
                                    <div class="col-4">
                                        <select class="form-control" name="tgl" id="">
                                            <option value="">-Pilih Tanggal-</option>
                                            <?php
                                            for ($i = 1; $i <= 31; $i++) {
                                            ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="bln" id="">
                                            <option value="">-Pilih Bulan-</option>
                                            <?php
                                            $bulan = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');
                                            foreach ($bulan as $k => $v) {
                                            ?>
                                                <option value="<?= $k ?>"><?= $v ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input type="number" class="form-control" name="thn" placeholder="Masukkan Tahun" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">ID Dokter</label>
                                <select name="id_dokter" class="form-select" aria-label="Default select example">
                                    <option selected>- Pilih Dokter -</option>
                                    <?php
                                    include('../koneksi.php');
                                    $qry = mysqli_query($koneksi, "SELECT * FROM dokter");
                                    foreach ($qry as $row) {
                                    ?>
                                        <option value="<?= $row['Dokter_ID'] ?>"><?= $row['Nama_Dokter'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Keluhan Pasien</label>
                                <input type="text" name="keluhan" placeholder="Masukkan Keluhan Pasien" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Biaya Administrasi</label>
                                <input type="number" name="biaya" placeholder="Masukkan Biaya Administrasi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="reset" class="btn btn-secondary">Clear</button>
                        </form>
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