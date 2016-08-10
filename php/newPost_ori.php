<?php

include "connectDBi.php";

try {
	//$connection = mysql_connect("localhost","mobileblog","password");
	//mysql_select_db("MobileBlog", $connection);
	// Note: You need to verify the data coming in isn't harmful, this SQL pretty much puts anything into the database so make sure to change this!
	//$postTitle = mysql_real_escape_string($_POST["postTitle"]);
	//$postContent = mysql_real_escape_string($_POST["postContent"]);

	$postTitle = $_POST["postTitle"];
	$postContent = $_POST["postContent"];
	
	$sql = "INSERT INTO forum (loginid,title,comment) VALUES(1,'$postTitle','$postContent')";
	$result = mysqli_query($conn, $sql);
	
	echo $result;
	
	//echo $postTitle;
	//echo $result;
	//$postTitle = $_POST["postTitle"];
	//echo $postTitle;
	//mysql_query("INSERT INTO posts (post_title, post_content) VALUES ('$postTitle', '$postContent')");
	//mysql_query("INSERT INTO forum (loginid,title,comment) VALUES(1,'$postTitle','$postContent') ");
	//mysql_close($connection);
	//echo "SUCCESS";
} catch(Exception $e) {
	//echo $e--->getMessage();
   // Note: Log the error or something
	echo $e->getMessage();
}
?>