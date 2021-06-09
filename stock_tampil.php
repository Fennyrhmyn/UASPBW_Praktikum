<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<?php
    session_start();
    if(isset($_SESSION['login']) == "") {
      header("Location:Login.php");
    } 
    ?>
	<!-- Navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand ms-5 ps-5" href="#">7'COORPORATION</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<?php
		            if($_SESSION['level'] == "admin" ) { ?>
    					<li class="nav-item">
    						<a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link active" href="stock_tampil.php">Stock Barang</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link" href="masuk_tampil.php">Barang Masuk</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link" href="keluar_tampil.php">Barang Keluar</a>
    					</li>
						<li class="nav-item ms-md-5">
						<a class="nav-link" href="logout.php"> Logout</a>
						</li>
					<?php
					}
					elseif($_SESSION['level'] == "karyawan") {
					?>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="stock_tampil.php">Stock Barang</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="masuk_tampil.php">Barang Masuk</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="keluar_tampil.php">Barang Keluar</a>
						</li>
						<li class="nav-item ms-md-5">
							<a class="nav-link" href="logout.php"> Logout</a>
						</li>
					<?php
					}
					elseif($_SESSION['level'] == "mahasiswa") {

					?>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="stock_tampil.php">Stock Barang</a>
						</li>
						<li class="nav-item ms-md-5">
							<a class="nav-link" href="logout.php"> Logout</a>
						</li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-xl mt-4 p-5  bg-light">
	  <h1 align="left mb-2"b >Menu Stock Barang</h1><hr>
	   <p>Berikut dibawah ini merupakan data stock barang di <b>7'Corp!</b></p>
	   <?php
	   if($_SESSION['level'] != "mahasiswa") {
	   	echo "
		<h4>
			<a href='stock_tambah.php' class='btn btn-info'>Tambah Barang</a>
		</h4>";
		}
	   ?>

		<!-- fungsi untuk menampilkan tabel yang berisi data dalam database-->
		<div class="table-responsive text-center">
		<table class="table table-striped table-bordered table-hover align-middle">
			<head>
				<tr class="table-success">
					<th>No</th>
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Stock</th>
					<?php
				   if($_SESSION['level'] != "mahasiswa") echo "<th>Aksi</th>";
				   ?>
				</tr>
			</head>
			<tbody>

				<!-- fungsi untuk memanggil data dalam database -->
				<?php
				include("koneksi.php");
				$no = 0;
				$data = mysqli_query($koneksi, "SELECT * FROM stock");
				while($baris=mysqli_fetch_array($data)){
				$no++;
			
				?>
				<tr>
					<td><?= $no ?></td>
					<td><?=$baris['id_barang']?></td>	
					<td><?=$baris['nama_barang']?></td>
					<td><?=$baris['unit']?></td>

						<!-- fungsi untuk menambah opsi hapus atau edit berdasarkan data yang dituju -->
						<?php
				            if($_SESSION['level'] == "admin" ) { ?>
							<td>
								<a href="stock_edit.php?id_barang=<?= $baris['id_barang']; ?>" class="btn btn-warning">Edit</a>
								<a href="stock_detail.php?id_barang=<?= $baris['id_barang']; ?>" class="btn btn-info">Detail</a>
								<a href="stock_hapus.php?id_barang=<?= $baris['id_barang']; ?>" class="btn btn-danger">Hapus</a>
							</td>
						<?php
			            }
			            elseif($_SESSION['level'] == "karyawan") {
			            ?>
				            <td>
					            <a href="stock_detail.php?id_barang=<?= $baris['id_barang']; ?>" class="btn btn-info">Detail</a>
					        </td>
			            <?php
				        }
				        ?>
				<?php
				}
				?>
			</tbody>
						
		</table>			
		</div>   
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>