<script type="text/javascript">
<?php 
require '../config.php';

if (isset($_POST['submit'])) {
	$isValid = true;

	$suara = $_POST['coblos'];
	$pemilih = $_SESSION['user'];


	// Cek user sudah / belum mencoblos
	$user = $_SESSION['user'];
	$result = mysqli_query($link,"SELECT * FROM suara WHERE pemilih=$user");
	if (mysqli_num_rows($result) > 0) {
		$isValid = false;
		$_SESSION['sukses'] = "alert('Ya, Anda mencoblos ini!')";
	}
	
	if ($isValid) {
		$date = date('Y-m-d H:i:s');
		$query = "INSERT INTO suara VALUES (NULL,$pemilih,$suara,'$date')";
		$result = mysqli_query($link, $query);
		$_SESSION['sukses'] = "alert('Selamat! Anda berhasil memilih!')";
	}
		header('Location: ../user/');
}else{
	header('Location: ../');
}

?>
</script>