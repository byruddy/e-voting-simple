<?php  

// Mengambil Data User yang sedang Login
$user = $_SESSION['user'];
$query = "SELECT * FROM mahasiswa WHERE nim=$user";
$result = mysqli_query($link,$query);
$userDetail = mysqli_fetch_array($result);

?>
<nav>
	<div class="my-profile">
		<h1>User :</h1>
		<h2><?php 
		// Cek panjang nama user, jika panjang potong &+ ...
		if (strlen($userDetail['nama']) > 18) {
			$userDetail['nama'] = substr($userDetail['nama'], 0,18);
			echo strtoupper($userDetail['nama'])." ..."; 
		}else{
			echo strtoupper($userDetail['nama']);
		}
		?></h2>
		<h3><?php echo $userDetail['jurusan'] ?> / Smt <?php echo $userDetail['semester'] ?></h3>
		<ul>
			<?php if ($_SERVER['PHP_SELF'] == "/success/pemilihan/user/add-voter.php") { echo "<li><a href='index.php'>Beranda</a></li>"; }else if($_SESSION['user'] == 1){ echo "<li><a href='add-voter.php'>Tambah Pemilih</a></li>"; } ?>
			<li><a href="../function/logout.php" onclick="return confirm('Anda yakin ingin keluar?')">Logout</a></li>
		</ul>
	</div> <!-- End my-profile -->
		<div class="pusat-bantuan">
		<ul>
			<li><a href="../petunjuk/#focus-video">Tutorial Pencoblosan</a></li>
		</ul>
	</div> <!-- End pusat-bantuan -->
</nav>