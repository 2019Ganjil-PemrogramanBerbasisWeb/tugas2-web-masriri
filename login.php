<?php
include 'koneksi.php';

$username = $_POST['name'];
$password = $_POST['city'];

$query = mysql_query("select * from customer where username='$username' and password='$password'");
$cek = mysql_num_rows($query);
echo $cek;
?>
