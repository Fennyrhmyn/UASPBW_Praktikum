<?php 
	require_once('_fungtions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>7 COORPORATION | Dashboard</title>
</head>
<body>

	<header>
		<nav>
			<ul class="nav-menu">
				<li>
					<span id=""><?= ucfirst($_SESSION['master']) ?></span>
					<ul class="dropdown-menu">
						<li><a href="<?=url('about.php')?>">Tentang Kami</a></li>
						<li><a href="<?=url('logout.php')?>">Keluar</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<div id="nav-mini">
			<a href="<?=url('karyawan/karyawan.php')?>" class="link-nav">Kelola Karyawan</a>
		</div>
	</header>