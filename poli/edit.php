<?php
######PROSES HAPUS#####

#1. membuat koneksi
include("../koneksi.php");

#2. mengambil value ID edit
$id = $_GET["id"];

#3. menjalankan query edit
$qry = mysqli_query($koneksi, "SELECT * FROM poli WHERE Poli_ID = '$id'");

#4. memisahkan field/kolom tabel pasien menjadi data array
$row = mysqli_fetch_array($qry);

$poli = $row['Nama_Poli'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poli</title>
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
                        Form Edit Data Poli
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_edit.php">
                            <input type="hidden" value="<?= $id ?>" name="idedit" id="">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Poli</label>
                                <input type="text" name="poli" value="<?=$poli?>" placeholder="Masukkan Nama Poli" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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