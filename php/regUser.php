<?php

include "connectDBi.php";

try {
	$method = strtolower($_SERVER["REQUEST_METHOD"]);
	switch($method) {
		case 'get':				// select	
			$data = $_GET;
			break;
		case 'post':			// insert
			$data = $_POST;
			break;
		case 'put':				// update
			parse_str(file_get_contents("php://input"),$put_vars);
			$data = $put_vars;
			break;
		case 'delete':			// delete
			parse_str(file_get_contents("php://input"),$put_vars);
			$data = $put_vars;
			break;
	}
	
	if (!empty($data["username"]) && !empty($data["password"]) && !empty($data["email"])) {
		$uid = $data["username"];
		$upw = $data["password"];
		$email = $data["email"];
		$query = "INSERT INTO memLogin (login,password,email) VALUES('$uid','$upw','$email')";
		$results = mysqli_query($conn, $query);
		if($results == 1){
			echo "true";  // success register
		} else {
			echo "false"; // register failed
		}
	} else {
		echo "false"; // missing parameter
	}
} catch(Exception $e) {
	echo json_encode($e->getMessage());
}
?>