<?php 
include "koneksi.php";

if (isset($_POST['tambah'])) {
	$id_keluar = $_POST['id_keluar'];
	$id_barang = $_POST['id_barang'];
	$tanggal = $_POST['tanggal'];
	$keterangan = $_POST['keterangan'];

	$query = mysqli_query($koneksi, "INSERT INTO br_keluar  VALUES ('$id_keluar','$id_barang', '$tanggal', '$keterangan')")
    or die(mysqli_error($koneksi)) ;

	// $sql = "INSERT INTO br_masuk(id_keluar, id_barang, tanggal, keterangan) VALUES ('$id_keluar', $id_barang', '$tanggal' '$keterangan')";
	// $query = mysqli_query($koneksi, $sql);

	if ($query) {
		header("Location: keluar_tampil.php");
	} else{
		echo "Gagal";
	}
}
 ?>