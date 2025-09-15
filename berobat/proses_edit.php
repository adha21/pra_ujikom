<?php
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$id = $_POST['idedit'];
$transaksi  = $_POST["transaksi"];
$idpasien = $_POST["id_pasien"];
$tgl = $_POST["tgl"];
$iddokter = $_POST["id_dokter"];
$keluhan = $_POST["keluhan"];
$biaya = $_POST["biaya"];

#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi, "UPDATE berobat SET No_Transaksi='$transaksi',PasienKlinik_ID='$idpasien',Tanggal_Berobat='$tgl',Dokter_ID='$iddokter',Keluhan_Pasien='$keluhan',Biaya_Adm='$biaya' WHERE No_Transaksi='$id'");

#4. pengalihan halaman jika proses tambah selesai
header("location:index.php");
