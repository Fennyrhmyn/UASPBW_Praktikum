<?php 
include "koneksi.php";

if (isset($_POST['tambah'])) {
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$deskripsi = $_POST['deskripsi'];
	$unit = $_POST['unit'];

	$sql = "INSERT INTO stock(id_barang, nama_barang, deskripsi, unit) VALUES ('$id_barang', '$nama_barang', '$deskripsi', '$unit')";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		header("Location: stock_tampil.php");
	} else{
		echo "Gagal";
	}
}
 ?>