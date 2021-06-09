<?php 

session_start();

// Koneksi Ke database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_barang";

// Koneksi ke Database
$koneksi = mysqli_connect($host,$username,$password,$dbname);

// Fungsi untuk menampilkan semua query dari database
function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// Fungsi Absolute URL
// Absolute url merupakan Serangkaian alamat yang menunjukkan suatu dokumen atau direktori, dengan menyertakan alamat domain atau host
function url($url = null){
	$url_utama = "http://localhost/barang";
	if ($url != null) {
		return $url_utama . '/' . $url;
	}else{
		return $url_utama;
	}
}

// CRUD (Management Karyawan)
function add_kary($karyawan){
	global $koneksi;

	$nama		= htmlspecialchars($karyawan['nama']);
	$username	= htmlspecialchars($karyawan['username']);
	$email		= htmlspecialchars($karyawan['email']);
	$password	= stripcslashes(htmlspecialchars($karyawan['password']));
	$level		= $karyawan['level'];

	// Cek apakah username dan email sudah tersedia
	$master = mysqli_query($koneksi,"SELECT * FROM master WHERE username='$username' OR email='$email'");
	if (mysqli_num_rows($master) > 0) {
		echo "
			<script>
				alert('Username atau Email Sudah Terdaftar')
			</script>
		";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	$insert = "INSERT INTO master VALUES ('','$nama','$email','$username','$password','$level')";
	mysqli_query($koneksi,$insert);

	return mysqli_affected_rows($koneksi);
}

function update_kary($up_kary){
	global $koneksi;

	$id_user 	= $up_kary['id_user'];
	$nama 		= htmlspecialchars($up_kary['nama']);
	$username 	= htmlspecialchars($up_kary['username']);
	$email 		= htmlspecialchars($up_kary['email']);

	$up_query = "UPDATE master SET 
		nama 		= '$nama', 
		username = '$username', 
		email 	= '$email' 
		WHERE id_user = '$id_user'
	";

	mysqli_query($koneksi,$up_query);
	return mysqli_affected_rows($koneksi);
}

function del_kary($id_kary){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM master WHERE id_user = '$id_kary'");
	return mysqli_affected_rows($koneksi);
}