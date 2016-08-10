<?php

include "connectDBi.php";

if (!empty($_GET["dupuser"])) {
	$loginid = $_GET["dupuser"];
	$query = "SELECT login FROM memLogin WHERE login = '$loginid' LIMIT 1;";
	$results = mysqli_query($conn, $query);
	if($results->num_rows == 0){
		echo "true";  //good to register
	} else {
		echo "false"; //already registered
	}
} else {
   echo "false"; //invalid post var
}
?>