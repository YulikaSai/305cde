<?php
include "connectDBi.php";
// get data parse by dynamic method
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

try {
	$uname = $data["username"];
	$upass = $data["password"];
	if (!empty($uname) && !empty($upass)) {
		$query = "SELECT login FROM memLogin WHERE login='$uname' and password='$upass' ";
		$results = mysqli_query($conn, $query);
		if($results->num_rows == 1){
			echo json_encode("true");  //valid login
		} else {
			echo json_encode("false"); // login invalid
			//echo json_encode($query);
		}
	} else {
		echo json_encode("require both login and password"); // empty login information
	}
} catch(Exception $e) {
	// throw error message
	echo json_encode($e->getMessage());
}
?>