<?php 
include "koneksi.php";

$id_masuk = $_GET['id_masuk'];

$query = mysqli_query($koneksi, "DELETE FROM br_masuk WHERE id_masuk='$id_masuk' ");

if ($query) {
	header("Location: masuk_tampil.php");
} else{
	echo "Gagal Menghapus";
}
 
 ?>