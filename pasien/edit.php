<?php
######PROSES HAPUS#####

#1. membuat koneksi
include("../koneksi.php");

#2. mengambil value ID edit
$id = $_GET["id"];

#3. menjalankan query edit
$qry = mysqli_query($koneksi, "SELECT * FROM pasien WHERE pasienKlinik_ID = '$id'");

#4. memisahkan field/kolom tabel pasien menjadi data array
$row = mysqli_fetch_array($qry);

$nama = $row['Nama_pasienKlinik'];
$tgl_lahir = $row['Tanggal_LahirPasien'];
$jk = $row['Jenis_kelaminPasien'];
$alamat = $row['Alamat_Pasien'];

?>


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
            <div class="col-7 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        Form Edit Data Pasien
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_form.php">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Pasien</label>
                                <input type="text" name="nama" value="<?=$nama?>" placeholder="Masukkan Nama Lengkap" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl" value="<?=$tgl_lahir?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                <select name="jk" class="form-select" aria-label="Default select example">
                                    <option selected>- Pilih Jenis Kelamin -</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                <input type="text" name="alamat" value="<?=$alamat?>" placeholder="Masukkan Alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
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