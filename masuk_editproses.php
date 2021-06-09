<?php 
include "koneksi.php";

if (isset($_POST['update'])) {
	$id_masuk = $_GET['id_masuk'];
	$id_barang = $_POST['id_barang'];
	$tanggal = $_POST['tanggal'];
	$penerima = $_POST['penerima'];

$query = mysqli_query($koneksi, "UPDATE br_masuk SET tanggal='$tanggal', penerima='$penerima' WHERE id_masuk='$id_masuk' ");

	if ($query) {
		header("Location: masuk_tampil.php");
	} else{
		echo "Gagal Update";
	}
}
?>