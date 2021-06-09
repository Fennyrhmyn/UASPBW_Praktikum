<!doctype html>
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
						<a class="nav-link" href="stock_tampil.php">Stock Barang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Barang Masuk</a>
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
	<div class="container-xl mt-4 p-5  bg-light">
		<h1 align="left mb-2">Menu Barang Masuk</h1><hr>
		<h4>
			<a href="masuk_tampil.php" class="btn btn-outline-info">Lihat Data Barang Masuk</a>
		</h4>
		<h5>Tambah Data Barang Masuk</h5>

		<!-- fungsi untuk menambah data melalui form -->
		<form action="masuk_tambahproses.php" method="POST">
	
			<div class="form-group row">
				<label for="id_masuk" class="col-sm-2 col-form-label">ID Masuk</label>
				<div class="col-sm-10">
					<input type="text" class="form-control mt-1 mb-1" name="id_masuk" id="id_masuk">
				</div>
			</div>		
			<div class="form-group row">
				<label for="id_barang" class="col-sm-2 col-form-label">ID Barang</label>
				<div class="col-sm-10">
					<input type="number" class="form-control mt-1 mb-1" name="id_barang" id="id_barang">
				</div>
			</div> 
			
			<div class="form-group row">
				<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-10">
					<input type="date" class="form-control mt-1 mb-1" name="tanggal" id="tanggal">
				</div>
			</div>
			<div class="form-group row">
				<label for="penerima" class="col-sm-2 col-form-label">Penerima</label>
				<div class="col-sm-10">
					<input type="text" class="form-control mt-1 mb-1" name="penerima" id="penerima">
				</div>
			</div>
			 <div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" name="tambah" id="tambah" class="btn btn-primary mt-3">Tambah</button>
				</div>
			</div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>