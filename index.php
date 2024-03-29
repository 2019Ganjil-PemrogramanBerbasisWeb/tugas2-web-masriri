<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.html");
	exit;
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Beranda Sistim Monitoring Online Tempat Pembuangan Sampah Surabaya</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><strong><a href="index.php">Dibuat</a></strong> oleh tim Masriri</h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Beranda</a></li>
						<li><a href="generic.php">Peta</a></li>
						<li><a href="#"><?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Banner -->
			<section id="banner">
				<h2>Selamat Datang</h2>
				<p>di website sistem monitoring online tempat  <br /> pembuangan sampah terpadu kota surabaya</p>
				<ul class="actions">
					<li><a href="generic.php" class="button special big">Lihat Map</a></li>
				</ul>
			</section>

			<!-- One -->
				<section id="one" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<header class="major">
									<h2>Fakta Sehari-hari</h2>
									<p>masa sih?</p>
								</header>
							</div>
							<div class="6u$ 12u$(medium)">
								<p>Bermula dari sampah masyarakat,
									 masing-masing kita produksi menghasilkan 0,5 kg
									 dalam sehari tanpa dipilah dan diolah terlebih dahulu.
									 Sampah menumpuk dan karena terkena hujan mengakibatkan gas
									 metana keluar naik dari tumpukan sampah. Gas metana terjebak
									  dan mengumpul karena sampah tidak memiliki ventilasi yang
										 mengakibatkan timbunan gas bersentuhan dengan udara. Dari
										 sinilah bisa terjadi pijar api disertai ledakan.
								</p>
								<p>Penyakit yang dapat menyebar melalui rantai makanan. Salah satu contohnya adalah suatu penyakit yang dijangkitkan oleh cacing pita (taenia). Cacing ini sebelumnya masuk ke dalam pencernakan binatang ternak melalui makanannya yang berupa sisa makanan/sampah</p>
							</div>
						</div>
					</div>
				</section>

			<!-- Two -->
				<section id="two" class="wrapper style2 special">
					<div class="container">
						<header class="major">
							<h2>Selamatkan Dunia Kita</h2>
							<p>Sampah adalah produk dari aktivitas manusia</p>
						</header>
						<div class="row 150%">
							<div class="6u 12u$(xsmall)">
								<div class="image fit captioned">
									<img src="images/pic02.jpg" alt="" />
									<h3> </h3>
								</div>
							</div>
							<div class="6u$ 12u$(xsmall)">
								<div class="image fit captioned">
									<img src="images/pic03.jpg" alt="" />
									<h3> </h3>
								</div>
							</div>
						</div>
					</div>
				</section>

			<!-- Three -->
				<section id="three" class="wrapper style1">
					<div class="container">
						<header class="major special">
							<h2>Testimoni</h2>
							<p>Pendapat Dari Para Tukang Sampah</p>
						</header>
						<div class="feature-grid">
							<div class="feature">
								<div class="image rounded"><img src="images/pic04.jpg" alt="" /></div>
								<div class="content">
									<header>
										<h4>Bambang</h4>
										<p>Tukang Sampah TPS Cabang Keputih Surabaya</p>
									</header>
									<p>Alhamdulillah dengan adanya sistem ini, kerja saya semakin ringan, Terima kasih Masriri! </p>
								</div>
							</div>
							<div class="feature">
								<div class="image rounded"><img src="images/pic05.jpg" alt="" /></div>
								<div class="content">
									<header>
										<h4>Noer</h4>
										<p>Tukang Sampah TPS Cabang Mulyorejo Surabaya </p>
									</header>
									<p>Mantullll!</p>
								</div>
							</div>
							<div class="feature">
								<div class="image rounded"><img src="images/pic06.jpg" alt="" /></div>
								<div class="content">
									<header>
										<h4>Sutedjo</h4>
										<p>Tukang Sampah TPS Cabang Kenjeran Surabaya</p>
									</header>
									<p>Mantab gan!</p>
								</div>
							</div>
							<div class="feature">
								<div class="image rounded"><img src="images/pic07.jpg" alt="" /></div>
								<div class="content">
									<header>
										<h4>Vina Surabaya</h4>
										<p>Tukang Sampah TPS Cabang Genteng Surabaya</p>
									</header>
									<p>Saya adalah cewek, tapi semangat saya cowok</p>
								</div>
							</div>
						</div>
					</div>
				</section>

			<!-- Four -->
				<section id="four" class="wrapper style3 special">
					<div class="container">
						<header class="major">
							<h2>Ada keluhan atau saran dari kamu?</h2>
							<p>Kirimkan melalui tombol di bawah ini</p>
						</header>
						<ul class="actions">
							<li><a href="feedback.php" class="button special big">Kirim feedback</a></li>
						</ul>
					</div>
				</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="https://web.facebook.com/?_rdc=1&_rdr" class="icon fa-facebook"></a></li>
						<li><a href="https://twitter.com" class="icon fa-twitter"></a></li>
						<li><a href="https://www.instagram.com/accounts/login/?source=auth_switcher" class="icon fa-instagram"></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled</li>
						<li>Design: <a>Tim</a></li>
						<li>Images: <a>Unsplash</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
