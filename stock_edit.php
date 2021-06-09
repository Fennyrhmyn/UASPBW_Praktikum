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
	<!-- Navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand ms-5 ps-5" href="#">7'COORPORATION</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Dashboard</a>
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
				</ul>
			</div>
		</div>
	</nav>

	<!-- fungsi  untuk mengedit data dan menampilkan data yang tersimpan -->
	<div class="container-xl mt-4 p-5  bg-light">
	  <h1 align="left mb-2">Menu Stock Barang</h1><hr>
		<h4>
			<a href="stock_tampil.php" class="btn btn-outline-info">Lihat Data Stock Barang</a>
		</h4>
		 <h5>Edit Data Stock Barang</h5>

			<!-- fungsi untuk memanggil data dalam database -->
			<?php
			include "koneksi.php";
			$id_barang = $_GET['id_barang'];
			$data = mysqli_query($koneksi, "SELECT * FROM stock WHERE id_barang='$id_barang'");
			$baris = mysqli_fetch_array($data);
			?>

			<form action="stock_editproses.php?id_barang=<?= $id_barang ?>" method="POST">
			  <div class="form-group row">
			    <label for="id_barang" class="col-sm-2 col-form-label">ID Barang</label>
			    <div class="col-sm-10">
			    <input type="number" class="form-control mt-1 mb-1" name="id_barang" id="id_barang" value="<?php echo $baris['id_barang']; ?>" disabled>
				</div>
			  </div>
			  <div class="form-group row">
			    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
			    <div class="col-sm-10">
			    <input type="text" class="form-control mt-1 mb-1" name="nama_barang" id="nama_barang" value="<?php echo $baris['nama_barang']; ?>">
				</div>
			  </div>
			  <div class="form-group row">
			    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
			    <div class="col-sm-10">
			    <input type="text" class="form-control mt-1 mb-1" name="deskripsi" id="deskripsi" value="<?php echo $baris['deskripsi']; ?>">
				</div>
			  </div>
			  <div class="form-group row">
			    <label for="stock" class="col-sm-2 col-form-label">Unit</label>
			    <div class="col-sm-10">
			    <input type="number" class="form-control mt-1 mb-1" name="unit" id="unit" value="<?php echo $baris['unit']; ?>">
				</div>
			  </div>
			  <div class="form-group row">
				 <div class="col-sm-10">
				    <button type="submit" name="update" id="update" class="btn btn-primary mt-3">Update</button>
				 </div>
			  </div>
			</form>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>