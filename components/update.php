<?php
if (isset($_POST['id'])&&isset($_POST['text'])){
	include('../config/db_config.php');
		(int)$id =$_POST['id'];
		$text =strip_tags($_POST['text']);
		$textautor =strip_tags($_POST['texautor']);
	
	$search = array(PHP_EOL, chr(10), chr(13), '\r' , '\n', '\t', '\x0B', '\0');
$replace = '';
$text = str_replace($search , $replace, $text);
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		
		
		
		$sql = "UPDATE books SET name='$text', autor='$textautor' WHERE id=$id";
		
		$resultS = $conn->query($sql);
		mysqli_close($conn);
		
		if($resultS){echo 'Записано успішно';}else{
			echo 'Не записано';}
		
	}