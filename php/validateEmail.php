<?php

include "connectDBi.php";

try {
	if (!empty($_GET["dupemail"])) {
		$email = $_GET["dupemail"];
		$query = "SELECT email FROM memLogin WHERE email = '".$email."' LIMIT 1;";
		$results = mysqli_query($conn, $query);
		if($results->num_rows == 0){
			echo "true";  //good to register
		} else {
			echo "false"; //already registered
		}
	} else {
		echo "false"; //invalid post var
	}
} catch(Exception $e) {
	echo json_encode($e->getMessage());
}
?>