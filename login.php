<?php 
	require_once('_fungtions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory | Login</title>
	<link rel="stylesheet" href="<?= url('_assets/css/login.css')?>">
	<link rel="shortcut icon" href="<?= url('_assets/img/logo/favv.png') ?>" type="image/x-icon">
</head>
<body>
<?php 
		if (isset($_POST['login'])) {
			$username 	= $_POST['username'];
			$password 	= $_POST['password'];
			$pw_hash 	= sha1($password);

			$query = mysqli_query($koneksi,"SELECT * FROM master WHERE username = '$username'");
			$data = mysqli_fetch_assoc($query);

			if (mysqli_num_rows($query) > 0) {
				
				if ($pw_hash = $data['password']) {
					$_SESSION['login'] = true;

					if ($data['level'] == "admin") {
						session_start();
						$_SESSION['nama']	= $data['nama'];
						$_SESSION['email']	= $data['email'];
						$_SESSION['level']	= $data['level'];
						header("Location: index.php");

					} else	if ($data['level'] == "mahasiswa") {
						session_start();
						$_SESSION['nama']	= $data['nama'];
						$_SESSION['email']	= $data['email'];
						$_SESSION['level']	= $data['level'];
						header("Location: index.php");

					} else	if ($data['level'] == "karyawan") {
						session_start();
						$_SESSION['nama']	= $data['nama'];
						$_SESSION['email']	= $data['email'];
						$_SESSION['level']	= $data['level'];
						header("Location: index.php");
					}
				}else {?>

					<div class="overlay">
						<div class="boxSalah">
							<a href="<?= url('login.php');?>" class="close">&times;</a>
							<p>Password Salah!</p>
						</div>
					</div>
				
				<?php 
				}
			}else{?>
				<div class="overlay">
					<div class="boxSalah">
						<a href="<?= url('login.php');?>" class="close">&times;</a>
						<p>Username & password salah!</p>
					</div>
				</div>
			<?php 
			}
		}
	?>

	<div class="box">
		<div class="box-content">
			<div class="col box__left">
				<div class="box__left-title">
					<h4>Silahkan Masukan Usename & Password</h4>
				</div>

				<div class="box__left-form">
					<form action="" method="post">
						<div class="box__left-form-group">
							<div class="input-form">
								<input type="text" name="username" placeholder="Username" required autocomplete="off">
							</div>
						</div>

						<div class="box__left-form-group">
							<div class="input-form">
								<input type="password" name="password" placeholder="Password" required autocomplete="off">
							</div>
						</div>

						<div class="box__left-form-group">
							<button type="submit" name="login" class="btn-login mt-1">Login</button>
						</div>
					</form>
				</div>
			</div>

			<div class="col box__right">
				<div class="box__right-content">
					<div class="text__right">
						<h1></h1>
					</div>

					<!-- Bubble Variasi -->
					<div class="bubble-1"></div>
					<div class="bubble-2"></div>
					<div class="bubble-3"></div>
					<div class="bubble-4"></div>
					<div class="bubble-5"></div>
					<div class="bubble-6"></div>

					<!-- Garis Variasi -->
					<div class="garis garis-sm garis-1"></div>
					<div class="garis garis-md garis-2"></div>
					<div class="garis garis-sm garis-3"></div>
					<div class="garis garis-md garis-4"></div>
					<div class="garis garis-md garis-5"></div>
					<div class="garis garis-lg garis-6"></div>
					<div class="garis garis-lg garis-7"></div>
					<div class="garis garis-xl garis-8"></div>
					<div class="garis garis-sm garis-9"></div>
					<div class="garis garis-md garis-10"></div>
					<div class="garis garis-sm garis-11"></div>
					<div class="garis garis-md garis-12"></div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>