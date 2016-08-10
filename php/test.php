<?php
include "mysqli_conn_inc.php";

$abc = $_GET["test"];
echo json_encode($abc);
?>