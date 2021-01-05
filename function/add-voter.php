<?php 
require '../config.php';


if (!isset($_POST['submit'])) {
	header('Location: ../');
	exit;
} else {
	$isValid = true;
	$msg	 = "";

	$nim	  = $_POST['nim'];
	$password = $_POST['password'];
	$nama	  = $_POST['nama'];
	$semester = $_POST['semester'];
	$jurusan  = $_POST['jurusan'];

	if (!is_numeric($nim)) {
		$isValid = false;
		$msg	.= "Nim hanya boleh dengan angka!<br>";
	}

	if ($semester == "") {
		$isValid = false;
		$msg	.= "Harap pilih semester Anda!<br>";
	} 
	if ($jurusan == "") {
		$isValid = false;
		$msg	.= "Harap pilih jurusan Anda!";
	}

	if ($isValid) {				
		$query	= "INSERT INTO mahasiswa VALUES ($nim,'$password','$nama',$semester,'$jurusan')";
		$result	= mysqli_query($link,$query);
		$_SESSION['msg-success'] = $nama.", Berhasil ditambahkan ke dalam database pemilih!";
	} else {
		$_SESSION['value']	= $_POST;
		$_SESSION['msg'] = $msg;
	} header('Location: ../user/add-voter.php');
}