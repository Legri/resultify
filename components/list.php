<?php
include('../config/db_config.php');
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
$result = $conn->query( "SELECT `id`, `name`, `autor`, `foto` FROM `books` ORDER by `date` DESC");
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
if ($outp != "") {$outp .= ",";}
$outp .= '{"id":"'  . $rs["id"] . '",';
$outp .= '"name":"'   . $rs["name"]        . '",';
$outp .= '"autor":"'   . $rs["autor"]        . '",';
$outp .= '"foto":"'. $rs["foto"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();
echo($outp);
?>