<?php  
require '../config.php';

if (isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login to Voting - Universitas Serang Raya</title>
	 <link href='../assets/images/Logo-unsera.png' rel='shortcut icon'>
	 <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<!-- CONTAINER -->
	<div id="container">
	<img name="cctv" src="../assets/images/cctv.gif">
	<!-- HEADER -->
	<?php include '../template/header.php'; ?>
	<!-- MAIN CONTENT -->
	<div class="main-login">
		<a name="back" href="../index.php">< Kembali ke Beranda</a>

		<form action="../function/login.php" method="POST">
		<?php if (isset($_SESSION['msg'])) { echo "<p name='msg-error'>".$_SESSION['msg']."</p>"; unset($_SESSION['msg']); } ?>
			<h3>Login</h3>
			<table>
				<tr>
					<td name="left">NIM</td>
					<td name="center">:</td>
					<td><input type="text" name="nim" autofocus placeholder="12345678" autocomplete="off" required></td>
				</tr>
				<tr>
					<td name="left">Password</td>
					<td name="center">:</td>
					<td><input type="password" name="password" placeholder="******" required></td>
				</tr>
				<tr>
					<td></td><td></td>
					<td><input type="submit" name="submit" value="Login"></td>
				</tr>
			</table>
		</form>
	</div> <!-- End main-login -->
	<!-- FOOTER -->
	<?php include '../template/footer.php'; ?>
	</div> <!-- End container -->
</body>
</html>