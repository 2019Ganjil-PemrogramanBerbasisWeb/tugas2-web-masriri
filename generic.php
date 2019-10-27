<?php


session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Maps</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
			<header id="header">
				<h1><strong><a href="index.php">Dibuat</a></strong> oleh tim Masriri</h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Beranda</a></li>
						<li><a href="generic.php">Peta</a></li>
						<li><a href="logout.php"><?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
					</ul>
				</nav>
			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						<h2>Tampilan Peta</h2>
						<p>Tampilan Peta TPS Di Surabaya</p>
					</header>

					<!--Google map-->
<div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 500px">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63320.99297153448!2d112.76926479052773!3d-7.290563564153677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa7132168ad7%3A0xd393abb0da9020e!2sSukolilo%2C%20Surabaya%20City%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1571990205062!5m2!1sen!2sid" width="1000" height="500" frameborder="0" style="border:0;" allowfullscreen="">" frameborder="0"
    style="border:0" allowfullscreen></iframe>
</div>

				</div>
			</section>

			<footer id="footer">
				<div class="container">
					<ul class="icons">
					<li>
						<li><a href="https://web.facebook.com/?_rdc=1&_rdr" class="icon fa-facebook"></a></li>
						<li><a href="https://twitter.com" class="icon fa-twitter"></a></li>
						<li><a href="https://www.instagram.com/accounts/login/?source=auth_switcher" class="icon fa-instagram"></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Pemerintah Kota Surabaya | Dinas Komunikasi dan Informasi</li>
						<li>Design by : <a>Tim Masriri</a></li>
						<li>Images by : <a>Google</a></li>
					</ul>
				</div>
			</footer>

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
