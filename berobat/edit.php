<?php
###Mengambil data pasien berdasarkan ID terpilih###

#1. membuat koneksi
include("../koneksi.php");

#2. mengambil value ID hapus
$id = $_GET["id"];

#3. menjalankan query hapus
$qry = mysqli_query($koneksi, "SELECT * FROM berobat WHERE No_Transaksi = '$id'");

#4. memisahkan field/kolom tabel pasien menjadi data array
$row = mysqli_fetch_array($qry);

$transaksi  = $row["No_Transaksi"];
$idpasien   = $row["PasienKlinik_ID"];
$tgl        = $row["tgl"];
$bln        = $row["bln"];
$thn        = $row["thn"];
$tanggal    = $thn . "-" . $bln . "-" . $tgl;
$iddokter   = $row["Dokter_ID"];
$keluhan    = $row["Keluhan_Pasien"];
$biaya      = $row["Biaya_Adm"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/all.css">
</head>

<body style="background-color: #EFF5D2;">
    <?php
    include('../navbar.php');
    ?>
    <div class="container">
        <!-- disini kontennya -->
        <div class="row">
            <div class="col-10 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <b>Form Edit Data Berobat</b>
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_edit.php">
                            <input type="hidden" name="idedit" value="<?= $id ?>">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No. Transaksi</label>
                                <input type="text" value="<?= $transaksi ?>" name="transaksi" placeholder="Masukkan nomor transaksi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nama Pasien</label>
                                <select name="id_pasien" class="form-select" aria-label="Default select example">
                                    <option>- Pilih Pasien -</option>
                                    <?php
                                    include('../koneksi.php');
                                    $qry = mysqli_query($koneksi, "SELECT * FROM pasien");
                                    foreach ($qry as $row) {
                                    ?>
                                        <option <?php echo ($idpasien == $row['pasienKlinik_ID']) ? 'selected' : '' ?> value="<?= $row['pasienKlinik_ID'] ?>"><?= $row['Nama_pasienKlinik'] ?></option>
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
                                        <input type="number" value="" class="form-control" name="thn" placeholder="Masukkan Tahun" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nama Dokter</label>
                                <select name="id_dokter" class="form-select" aria-label="Default select example">
                                    <option>- Pilih Dokter -</option>
                                    <?php
                                    include('../koneksi.php');
                                    $qry = mysqli_query($koneksi, "SELECT * FROM dokter");
                                    foreach ($qry as $row) {
                                    ?>
                                        <option <?php echo ($iddokter == $row['Dokter_ID']) ? 'selected' : '' ?> value="<?= $row['Dokter_ID'] ?>"><?= $row['Nama_Dokter'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Keluhan Pasien</label>
                                <input value="<?= $keluhan ?>" name="keluhan" type="text" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Biaya Adm</label>
                                <input value="<?= $biaya ?>" name="biaya" type="text" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
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