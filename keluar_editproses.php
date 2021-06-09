<?php 
include "koneksi.php";

if (isset($_POST['update'])) {
	$id_keluar = $_GET['id_keluar'];
	$id_barang = $_POST['id_barang'];
	$tanggal = $_POST['tanggal'];
	$keterangan = $_POST['keterangan'];

	$query = mysqli_query($koneksi, "UPDATE br_keluar SET  tanggal='$tanggal', keterangan='$keterangan' WHERE id_keluar='$id_keluar' ");


	if ($query) {
		header("Location: keluar_tampil.php");
	} else{
		echo "Gagal Update";
	}
}
?>