<?php  
require 'config.php';

// Cek Jumlah Suara Terbaru
$JumlahSuara = mysqli_num_rows(mysqli_query($link,"SELECT * FROM suara"));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pencoblosan Cagub & Cawagub Jakarta - Universitas Serang Raya</title>
	 <link href='assets/images/Logo-unsera.png' rel='shortcut icon'>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
	<!-- CONTAINER -->
	<div id="container" style="margin-top: 50px">
	<img name="cctv" src="assets/images/cctv.gif">
	<!-- HEADER -->
	<?php include 'template/header.php'; ?>
	<!-- MAIN CONTENT -->
	<div class="main-index">
		<h3>SIAPAKAH CAGUB & CAWAGUB JAKARTA 2016<br>PILIHAN ANDA ?</h3>
		<div class="pilih">
			<img src="assets/images/1.jpg">
			<div class="bg-pilih"></div>
			<a href="visimisi/1/">Lihat Profil</a>
			<p class="calon">Basuki - Djarot</p>
			<p class="no-urut">Nomor Urut 1</p>
		</div> <!-- End pilih 1 -->
		<div class="pilih">
			<img src="assets/images/2.jpg">
			<div class="bg-pilih"></div>
			<a href="visimisi/2/">Lihat Profil</a>
			<p class="calon">Agus - Sylviana</p>
			<p class="no-urut">Nomor Urut 2</p>
		</div> <!-- End pilih 2 -->
		<div class="pilih">
			<img src="assets/images/3.jpg">
			<div class="bg-pilih"></div>
			<a href="visimisi/3/">Lihat Profil</a>
			<p class="calon">Anies - Sandiaga</p>
			<p class="no-urut">Nomor Urut 3</p>
		</div> <!-- End pilih 3 -->
	<div class="clear"></div>
	<div class="footer-index">
		<div class="info">
			<span class="column">
				<h2><?php echo $JumlahSuara; ?></h2>
				<p>Suara Terkumpul</p>
			</span>	
			<span class="last-coblos">
				<!-- Menampilkan 4 pemilih terakhir -->
				<?php  
				$n 		= 1;
				$query = "SELECT nama FROM suara a INNER JOIN mahasiswa b ON a.pemilih = b.nim ORDER BY a.tgl DESC LIMIT 4";
				$result = mysqli_query($link,$query);

				?>
				<h4><?php while ($row = mysqli_fetch_array($result)) {
					if ($n > 1) echo " | ";
					echo $row['nama'];
					$n++;
				} ?></h4>
				<p>Pemilih terakhir</p>
			</span>
		</div> <!-- End info -->
		<div class="login">
			<a href="user/login.php" title="Klik untuk mencoblos!">COBLOS SEKARANG!</a>
			<a href="petunjuk/#focus-video" name="video">Petunjuk Pencoblosan</a>
		</div> <!-- End login -->
	<div class="clear"></div>
	</div> <!-- End footer-index -->			
	</div> <!-- End main-index -->
	<!-- FOOTER -->
	<?php include 'template/footer.php'; ?>
	</div> <!-- End container -->
</body>
</html>