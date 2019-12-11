<?php


session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Insert Data</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <style type="text/css">
            .major {
                margin-bottom: 0px;
            }
        
        </style>
    
</head>

<body>
        <header id="header">
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
            

            <section id="one" class="wrapper style1">
                <div class="container">
                    
                    <h1>Pemasukan Data TPS Surabaya</h1>
                    <div class="row">
                        <div class="col-sm-8">
                             <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Nama TPS</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <!-- left side | right side -->
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Kg</span>
                                </div>
                            <input type="text" class="form-control" placeholder="Berat (dalam kg)" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>

                <button type="button" class="btn btn-primary">masukan data</button>

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

