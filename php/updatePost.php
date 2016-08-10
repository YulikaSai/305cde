<?php
include "connectDBi.php";

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
	$recid = $data["recID"];
	$comment = $data["newComment"];
	$sql = "UPDATE forum set comment = '$comment' WHERE id = $recid";
	$result = mysqli_query($conn, $sql);
	if($result == 1) {
		echo json_encode("success");
	} else {
		echo json_encode("failed");
	}
} catch(Exception $e) {
	echo json_encode($e->getMessage());
}