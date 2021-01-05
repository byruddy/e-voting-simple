<header>
	<img src="/pemilihan/assets/images/top-banner.jpg">
<div class="clear"></div>
</header> <!-- End header -->
<div class="title">
	<h1>
	<?php  
		if ($_SERVER['PHP_SELF'] == "/success/pemilihan/index.php") {
			echo "Selamat Datang di Pemilihan Cagub & Cawagub Jakarta 2016";
 		} elseif ($_SERVER['REQUEST_URI'] ==  "/success/pemilihan/user/login.php") {
 			echo "Silahkan login untuk mencoblos pasangan Cagub & Cawagub Anda.";
 		} else if ($_SERVER['PHP_SELF'] ==  "/success/pemilihan/user/index.php") {
 			echo "Ayo coblos, jangan mendengarkan kata teman, dengarkan kata hatimu!";
 		} elseif ($_SERVER['PHP_SELF'] == "/success/pemilihan/visimisi/1/index.php" OR
 				  $_SERVER['PHP_SELF'] == "/success/pemilihan/visimisi/2/index.php" OR
 				  $_SERVER['PHP_SELF'] == "/success/pemilihan/visimisi/3/index.php"){
 			echo "Visi & Misi";
 		} elseif ($_SERVER['REQUEST_URI'] == "/success/pemilihan/user/add-voter.php") {
 			echo "Form penambahan pemilihan!";
 		}
	?>
	</h1>
</div> <!-- End title -->