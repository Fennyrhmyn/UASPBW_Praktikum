<?php 
include "koneksi.php";

if (isset($_POST['update'])) {
	$id_barang = $_GET['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$deskripsi = $_POST['deskripsi'];
	$unit = $_POST['unit'];

$query = mysqli_query($koneksi, "UPDATE stock SET nama_barang = '$nama_barang', deskripsi = '$deskripsi', unit = '$unit' WHERE id_barang = '$id_barang'");

	if ($query) {
		header("Location: stock_tampil.php");
	} else{
		echo "Gagal Update";
	}
}
?>