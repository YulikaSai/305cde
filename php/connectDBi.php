<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
try {
	$hostname = "fdb12.biz.ht";
	$username = "2179384_demo";
	$password = "demo1234";
	$dbname = "2179384_demo";
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf-8");
} catch(Exception $e) {
	echo $e->getMessage();
}
?>

