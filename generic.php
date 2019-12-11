<?php

session_start();


 // Include config file
require "conn_tps.php";


$result = mysqli_query($link, "SELECT nama_tps, no FROM tps ORDER BY no DESC");

$berat = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Check input errors before inserting in database
	if (empty($berat)) {
		 
		// Prepare an insert statement
		$sql = "UPDATE tps SET gambar = ?, berat = ? WHERE no = ?";
		if ($stmt = mysqli_prepare($link, $sql)) {
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "bss", $param_image, $param_berat, $param_nama);
			// Set parameters
			$param_berat = trim($_POST["berat"]);
			$param_nama = trim($_POST["nama"]);
			//Get the content of the image and then add slashes to it 

			if(file_exists($_FILES['fileToUpload']['tmp_name'])) {
				$param_image = move_uploaded_file($_FILES['filetoUpload']['tmp_name'], 'uploads/'.$_FILES['fileToUpload']['name']);
			}

			// Attempt to execute the prepared statement
			if (mysqli_stmt_execute($stmt)) {
				// Redirect to login page
				echo "Data sudah dimasukkan";
			} else {
				echo "Something went wrong. Please try again later.";
			}

			// Close statement
			mysqli_stmt_close($stmt);

		}
	}
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Maps</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/main.css" />
		<style type="text/css">
			.large {
				font-size: 1.5em;
				color: black;
				font-weight: bold;
			}

			.table {
				margin: 0px 150px;
				width: 1150px;
				height: auto;
				
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
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
						method="post" enctype="multipart/form-data">
                <div class="container">

			
			</button>

					<header class="large">
					<p>Pemasukan Data TPS Surabaya</p>
					</header>

					<!-- start of row -->
                    <div class="row">
                        <div class="col-sm-8">
                             <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Nama TPS</label>
                                </div>
                                <select name="nama" class="custom-select" id="inputGroupSelect01">
								<!-- nama tps -->

                                    <option selected>Choose...</option>
                                    <?php
   						 				while ($row = mysqli_fetch_array($result)) {
       									 echo "<option value='" . $row['no'] . "'>'" . $row['nama_tps'] . "'</option>";
   										 }
    								?> 
                                </select>
								
                            </div>
                        </div>
                        <!-- left side | right side -->
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Kg</span>
                                </div>
                            <input type="text" name="berat"
							 value="<?php echo $berat; ?>"  class="form-control" placeholder="Berat (dalam kg)"/>


							
                            </div>
                        </div>
					</div>
					<!-- start of row -->

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Gambar TPS</span>
						</div>

						
						<div class="custom-file">
							<input type="file" name="fileToUpload" id="inputGroupFile01">
							<label for="inputGroupFile01" class="custom-file-label">Pilih file</label>
						</div>
					</div>
					
					<div class="form-group">								
                		<button type="submit" class="btn btn-primary" value="Submit">masukan data</button>
					</div>

                </div>
			</form>
			
            </section>

			<section>
			
			<table class=table table-hover>
			<thead>
			<tr>
			<th>Nomor</th>
			<th>Nama TPS</th>
			<th>Berat Sampah</th>
			<th>Gambar TPS</th>
			</tr>
			</thead>
			<tbody>	

			<?php	

			$result = mysqli_query($link, "SELECT berat, nama_tps, no, gambar FROM tps ORDER BY no ASC");

			while ($row = mysqli_fetch_array($result)) {								
						
				echo "<tr>"; 
				echo "<td>" . $row['no'] . "</td>";
				echo "<td>". $row['nama_tps'] . " </td>"; 
				echo "<td>" . $row['berat'] . " kilogram </td>";

				echo "<td><img src='data:image/jpeg;base64'".base64_encode( $row['gambar'] ). "'/></td>"; 
				echo "</tr>" ;
				
			}

			?> 	

			</tbody>;
			</table>;								


			<center><button type="button" class="btn btn-link"><a href="jexcel.php">
					Excel Spreadsheet
				</a>
		   2</center>


			</section>

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
						<a href="https://web.facebook.com/?_rdc=1&_rdr" class="icon fa-facebook"></a></li>
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

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
