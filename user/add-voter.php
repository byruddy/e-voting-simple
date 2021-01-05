<?php  
require '../config.php';

if (!isset($_SESSION['user']) ) {
	header('Location: login.php');
	exit;
}
if ($_SESSION['user'] != 1 ) {
	header('Location: login.php');
	exit;
}

// USER
$user = $_SESSION['user'];
$query = "SELECT * FROM mahasiswa WHERE nim=$user";
$result = mysqli_query($link,$query);
$userDetail = mysqli_fetch_array($result);


// Cek Jumlah Pemilih
$JumlahPemilih = mysqli_num_rows(mysqli_query($link,"SELECT * FROM mahasiswa"));


// Pilih satu pemilih terakhir
$lastMahasiswa =  mysqli_fetch_array(mysqli_query($link, "SELECT nim FROM mahasiswa ORDER BY nim DESC LIMIT 1"));
$nextPemilih = 11216 . substr($lastMahasiswa['nim'], 5,7)+1;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Pemilih | Universitas Serang Raya</title>
	 <link href='../assets/images/Logo-unsera.png' rel='shortcut icon'>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<!-- CONTAINER -->
	<div id="container">
	<!-- HEADER -->
	<?php include '../template/header.php'; ?>
	<img name="cctv" src="../assets/images/cctv.gif">
	<!-- MAIN CONTENT -->
	<div class="main-addvoter">
		<!-- NAV -->
		<?php include '../template/nav.php'; ?>
		<div class="content-addvoter">
			<p>Tambah Pemilih</p>
			<?php  
			if (isset($_SESSION['msg-success'])){
				echo "<p name='msg-success'>".$_SESSION['msg-success']."</p>";
				unset($_SESSION['msg-success']);
			}
			if (isset($_SESSION['msg'])){
				echo "<p name='msg-error'>".$_SESSION['msg']."</p>";
				unset($_SESSION['msg']);
			}
			// VALUE EXTRACT
			if (isset($_SESSION['value'])) {
				extract($_SESSION['value']);
				unset($_SESSION['value']);
			}

			?>
			

			<form action="../function/add-voter.php" method="POST">
			<table>
				<tr>
					<td><label for="nim">Nim</label></td>
					<td><input type="text" name="nim" id="nim" placeholder="1234567" value="<?php echo $nextPemilih; ?>" <?php if (isset($nim)) { echo "value='".$nim."'"; } ?> required></td>
				</tr>
				<tr>
					<td><label for="password">Password</label></td>
					<td><input type="password" name="password" value="123" id="password" placeholder="********" required></td>
				</tr>
				<tr>
					<td><label for="nama">Nama</label></td>
					<td><input type="text" name="nama" id="nama" placeholder="Masukan nama Anda .." <?php if (isset($nama)) { echo "value='".$nama."'"; } ?> required></td>
				</tr>
				<tr>
					<td><label for="semester">Semester</label></td>
					<td><select name="semester" id="semester">
						<option value="">-[pilih]-</option>
						<option <?php if (isset($semester) && $semester == 1){ echo "selected"; } ?>  value="1">1</option>
						<option <?php if (isset($semester) && $semester == 2){ echo "selected"; } ?>  value="2">2</option>
						<option <?php if (isset($semester) && $semester == 3){ echo "selected"; } ?>  value="3">3</option>
						<option <?php if (isset($semester) && $semester == 4){ echo "selected"; } ?>  value="4">4</option>
						<option <?php if (isset($semester) && $semester == 5){ echo "selected"; } ?>  value="5">5</option>
						<option <?php if (isset($semester) && $semester == 6){ echo "selected"; } ?>  value="6">6</option>
						<option value="7" <?php if (isset($semester) && $semester == 7){ echo "selected"; } ?> >7</option>
					</select></td>
				</tr>
				<tr>
					<td><label for="jurusan">Jurusan</label></td>
					<td><select name="jurusan">
						<option value="">-[pilih]-</option>
						<option value="Teknik Informatika" <?php if (isset($jurusan) && $jurusan == "Teknik Informatika"){ echo "selected"; } ?>>Teknik Informatika</option>
						<option value="Komunikasi" <?php if (isset($jurusan) && $jurusan == "Komunikasi"){ echo "selected"; } ?>>Komunikasi</option>
					</select></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" name="submit" value="Simpan"></td>
				</tr>
			</table>
			</form>
			<span class="info">
				<h6>Total Pemilih</h6>
				<img src="../assets/images/group.png"><span class="text-info"><h3><?php echo $JumlahPemilih; ?></h3></span>
			</span> <!-- End info -->
			<div class="clear"></div>
		</div> <!-- End content-addvoter -->
	</div> <!-- End main-addvoter -->
	<div class="clear"></div>
	<!-- FOOTER -->
	<?php include '../template/footer.php'; ?>
	</div> <!-- End container -->
</body>
</html>