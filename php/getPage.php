<?php

include "connectDBi.php";
$navTo = $_POST["navTo"];
if (!empty($navTo)) {
	try {
		$query = "SELECT pageName FROM pagenav WHERE pageKey = '".$navTo."' LIMIT 1;";
		//$results = $mysqli->query($query);
		$results = mysqli_query($conn, $query);
		if($results->num_rows == 0){
			echo json_encode("false");
		} else {
			//$row = mysqli_fetch_array($result, MYSQLI_ASSOC)
			$row=mysqli_fetch_assoc($results);
			echo json_encode($row["pageName"]);
			//$filename = $row["pageName"];
			//echo json_encode("file:".$filename."  exists:".file_exists($filename));
			//$handle = fopen($filename, "r");
			//$contents = fread($handle, filesize($filename));
			//fclose($handle);
			//echo json_encode($contents);
			//$contents = file_get_contents("./p1.html", true);
		}
	} catch(Exception $e) {
		echo json_encode($e);
	}
} else {
   //echo "false:".$navTo; //invalid post var
	echo json_encode("false".$navTo);
}

?>