<?php
include "koneksi.php";

$id_barang = $_GET['id_barang'];

$query = mysqli_query($koneksi, "DELETE FROM stock WHERE id_barang='$id_barang'");

if($query){
    header("Location: stock_tampil.php");
}else{
    echo "Gagal";
}