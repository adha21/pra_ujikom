<?php
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$id = $_POST['idedit'];
$poli = $_POST["poli"];

#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi, "UPDATE poli SET Nama_Poli='$poli' WHERE Poli_ID='$id'");

#4. pengalihan halaman jika proses tambah selesai
header("location:index.php");
