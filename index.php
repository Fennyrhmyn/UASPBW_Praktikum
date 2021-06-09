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
			<a class="navbar-brand ms-lg-5 ps-lg-5" href="#">7'COORPORATION</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <?php
            if($_SESSION['level'] == "admin" ) { ?>
    					<li class="nav-item">
    						<a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link" href="stock_tampil.php">Stock Barang</a>
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
                <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="stock_tampil.php">Stock Barang</a>
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
                <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="stock_tampil.php">Stock Barang</a>
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

	<div class="container mt-4 p-lg-4 bg-light">
          <h1 align="left mb-2">DASHBOARD</h1><hr>
         
           <div class="alert alert-success">
            <h4 class="alert-heading">Halo, <?php echo $_SESSION['nama'] ?></h4>
            <p>Selamat datang di halaman Dashboard</p>

          <!-- // fungsi untuk memanggil jumlah data dalam database -->
          <?php
          include "koneksi.php";
          $jumstock = mysqli_query($koneksi, "SELECT * FROM stock");
          $jumin = mysqli_query($koneksi, "SELECT * FROM br_masuk");
          $jumout = mysqli_query($koneksi, "SELECT * FROM br_keluar");

          $jumlah_stock  =  mysqli_num_rows($jumstock);
          $jumlah_masuk =  mysqli_num_rows($jumin);
          $jumlah_keluar  =  mysqli_num_rows($jumout);
          ?>

          <!-- fungsi untuk menampilkan jumlah data dengan menggunakan card -->
          <div class="row row-cols-1 row-cols-md-3 g-4 text-white ">
            <div class="col">
              <div class="card">
                <div class="card-body bg-primary">
                  <h5 class="card-title">Jumlah Barang Stok</h5><hr>
                  <p class="card-text"><h1><?= $jumlah_stock ?></h1></p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body bg-success">
                  <h5 class="card-title">Jumlah Barang Masuk</h5><hr>
                  <p class="card-text"><h1><?= $jumlah_masuk ?></h1></p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body bg-warning">
                  <h5 class="card-title">Jumlah Barang Keluar</h5><hr>
                  <p class="card-text"><h1><?= $jumlah_keluar ?></h1></p>
                </div>
              </div>
            </div>
          </div>
       </div>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script type="javascript/txt" href="js/javascript.min.js"></script>
</body>
</html>