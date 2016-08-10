<?php
include "connectDBi.php";

try {
	$sql = "SELECT forum.*, memLogin.login FROM forum inner join memLogin on forum.loginid=memLogin.id order by createTime desc";
	$arrResult = array();
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		array_push($arrResult, $row);
	}
	//echo json_encode($sql);
	echo json_encode($arrResult);
} catch(Exception $e) {
	echo json_encode($e->getMessage());
}