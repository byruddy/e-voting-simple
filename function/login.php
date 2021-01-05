<?php  
require '../config.php';


if (isset($_POST['submit'])) {
	$isValid	= true;
	$nim		= $_POST['nim'];
	$password	= $_POST['password'];


	$query 	= "SELECT * FROM mahasiswa WHERE nim=$nim AND password='$password'";
	if (mysqli_num_rows(mysqli_query($link,$query)) > 0) {
		$_SESSION['user'] = $nim;
	} else {
		$_SESSION['msg'] = "Nim dan Password tidak sesuai!";
	}
	header('Location: ../user/');
}