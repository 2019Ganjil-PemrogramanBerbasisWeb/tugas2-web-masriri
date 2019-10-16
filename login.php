<?php

session_start();
include 'koneksi.php';


if(isset($_POST['name']) and isset($_POST['password']) ) {

$name = $_POST['name'];
$password = md5($_POST['password']);

$login = mysqli_query($con, "SELECT * FROM `users` where name='$name' and password='$password'");
$cek = mysqli_num_rows($login);


if($cek > 0) {

	$_SESSION['name'] = $name;
	$_SESSION['status'] = "login";
	header("location:index.html");
} else {
	header("location:login.html");
}

}

?>
