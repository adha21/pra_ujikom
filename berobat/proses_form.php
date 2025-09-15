<?php
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$transaksi  = $_POST["transaksi"];
$idpasien   = $_POST["id_pasien"];
$tgl        = $_POST["tgl"];
$bln        = $_POST["bln"];
$thn        = $_POST["thn"];
$tanggal    = $thn."-".$bln."-".$tgl;
$iddokter   = $_POST["id_dokter"];
$keluhan    = $_POST["keluhan"];
$biaya      = $_POST["biaya"];


#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi, "INSERT INTO berobat (No_Transaksi,PasienKlinik_ID,Tanggal_Berobat,Dokter_ID,Keluhan_Pasien,Biaya_Adm)
VALUES('$transaksi','$idpasien','$tanggal','$iddokter','$keluhan','$biaya')");

#4. pengalihan halaman jika proses tambah selesai
header("location:index.php");
