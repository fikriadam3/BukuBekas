<?php 
if (!empty($_SESSION)) {
	if ($_SESSION['level'] !== 'admin') {
		echo "<script>history.back();</script>";
	}
}else{
	echo "<script>window.location.href = '".BASEURL."/user/login';</script>";
}




 ?>
<style>
	body{
		background-image: url('<?= BASEURL; ?>/img/hero-bg.jpg');
	}
</style>
 
<div class="container d-flex" align="center" style="justify-content: center; margin-top: 40vh;">
	<h1>Selamat Datang Admin</h1>
</div>