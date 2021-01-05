<?php  
require '../config.php';

if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit;
}

if (isset($_SESSION['sukses'])) {
	echo '<script>';
	echo $_SESSION['sukses'];
	echo "</script>";
	unset($_SESSION['sukses']);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Universitas Serang Raya</title>
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
	<div class="main-user-index">
		<!-- NAVBAR -->
		<?php include '../template/nav.php'; ?>
		<div class="content-index">
			<div class="coblos">
				<img title="Basuki - Djarot" src="../assets/images/1.jpg">
				<?php 
				// Cek user sudah / belum mencoblos
				$user = $_SESSION['user'];
				$result =  mysqli_query($link,"SELECT * FROM suara WHERE pemilih=$user");
				$cekSuara  = mysqli_num_rows($result);
				$cekPilihan = mysqli_fetch_array($result);

				if ($cekSuara < 1) {
					echo '<form action="../function/voting.php" method="POST">
							<input type="hidden" name="coblos" value="1">
							<input type="submit" name="submit" value="COBLOS">
							<h6>1</h6>
						  </form>';
				}else if($cekPilihan['mencoblos'] == 1) {
					echo '<form action="../function/voting.php" method="POST">
							<input type="hidden" name="coblos" value="1">
							<input type="submit" name="submit" id="coblos" value="COBLOS">
							<h6>1</h6>
						  </form>';
				}
				?>
			</div>
			<div class="coblos">
				<img title="Agus - Sylviana" src="../assets/images/2.jpg">
				<?php 
				if ($cekSuara < 1) {
					echo '<form action="../function/voting.php" method="POST">
							<input type="hidden" name="coblos" value="2">
							<input type="submit" name="submit" value="COBLOS">
							<h6>2</h6>
						  </form>';
				}else if($cekPilihan['mencoblos'] == 2) {
					echo '<form action="../function/voting.php" method="POST">
							<input type="hidden" name="coblos" value="2">
							<input type="submit" name="submit" id="coblos" value="COBLOS">
							<h6>2</h6>
						  </form>';
				}
				?>
			</div>
			<div class="coblos">
				<img title="Anies - Sandiaga" src="../assets/images/3.jpg">
				<?php 
				if ($cekSuara < 1) {
					echo '<form action="../function/voting.php" method="POST">
							<input type="hidden" name="coblos" value="3">
							<input type="submit" name="submit" value="COBLOS">
							<h6>3</h6>
						  </form>';
				}else if($cekPilihan['mencoblos'] == 3) {
					echo '<form action="../function/voting.php" method="POST">
							<input type="hidden" name="coblos" value="3">
							<input type="submit" name="submit" id="coblos" value="COBLOS">
							<h6>3</h6>
						  </form>';
				}
				?>
			</div>
		<div class="clear"></div>
		<!-- Mengitung suara dan menampilkan secara persen -->
		<?php  
		// Cek Total Suara
		$QuerySuara = mysqli_num_rows(mysqli_query($link,"SELECT * FROM suara"));

		// Suara Ahok
		$SuaraAhok = mysqli_num_rows(mysqli_query($link,"SELECT * FROM suara WHERE mencoblos=1"));
		// Suara Agus
		$SuaraAgus = mysqli_num_rows(mysqli_query($link,"SELECT * FROM suara WHERE mencoblos=2"));
		// Suara Anies
		$SuaraAnies = mysqli_num_rows(mysqli_query($link,"SELECT * FROM suara WHERE mencoblos=3"));

		$TotalSuara = $QuerySuara;
		$ahok = $SuaraAhok/$TotalSuara * 100;
		$agus   = $SuaraAgus/$TotalSuara * 100;
		$anies = $SuaraAnies/$TotalSuara * 100;
		?>
			<div class="suara-sekarang">
			<table>
				<tr>		
				<td></span><h4>1. Basuki - Djarot</h4></td><td>
				<td><div class="progress"><p style="width: <?php echo $ahok; ?>%"><?php echo round($ahok); ?>%</p></div></td>
				</tr>

				<tr>		
				<td><h4>2. Agus - Sylviana</h4></td><td>
				<td><div class="progress"><p style="width: <?php echo $agus; ?>%"><?php echo round($agus); ?>%</p></div></td>
				</tr>
				
				<tr>		
				<td><h4>3. Anies - Sandiaga</h4></td><td>
				<td><div class="progress"><p style="width: <?php echo $anies; ?>%"><?php echo round($anies); ?>%</p></div></td>
				</tr>
			</table>
			<img src="../assets/images/icon-coblos.png">
			</div> <!-- End suara-sekarang -->
		</div> <!-- End content-index -->
	</div> <!-- End main-user-index -->
	<!-- FOOTER -->
	<?php include '../template/footer.php'; ?>
	</div> <!-- End container -->
</body>
</html>
