<?php 
include "koneksi.php";

$id_keluar = $_GET['id_keluar'];

$query = mysqli_query($koneksi, "DELETE FROM br_keluar WHERE id_keluar='$id_keluar' ");

if ($query) {
	header("Location:keluar_tampil.php");
} else{
	echo "Gagal Menghapus";
}
 
 ?>