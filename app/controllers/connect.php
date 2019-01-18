<?php 

$host = 'db4free.net';
$username = 'basement15';
$password = 'secretsecret';
$dbname = 'basement15_db';


$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('connection failed: ' . mysqli_error($conn));
}

//echo 'connected succesfully';

 ?>