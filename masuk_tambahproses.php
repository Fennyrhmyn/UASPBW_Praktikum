<?php 
include "koneksi.php";

if (isset($_POST['tambah'])) {
	$id_masuk = $_POST['id_masuk'];
	$id_barang = $_POST['id_barang'];
	$tanggal = $_POST['tanggal'];
	$penerima = $_POST['penerima'];

	$query = mysqli_query($koneksi, "INSERT INTO br_masuk  VALUES ('$id_masuk','$id_barang', '$tanggal', '$penerima')")
    or die(mysqli_error($koneksi)) ;


	if ($query) {
		header("Location: masuk_tampil.php");
	} else{
		echo "Gagal";
	}
}
 ?>