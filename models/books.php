<?php
class Books {
	function __construct() {
		
		
		
	}
	
	
	public static function getBooksItemById($id){
		include(ROOT.'/config/db_config.php');
		
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		
		
		
		$sql = "SELECT * FROM `books` WHERE id=$id";
		
		$resultS = $conn->query($sql);
		mysqli_close($conn);
		return $resultS;
	}
	
	
	
	public static function getBooksList(){
		include(ROOT.'/config/db_config.php');
	
// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		//echo "Connected successfully";
		
		$sql = "SELECT `id`, `name`, `autor`, `foto` FROM `books` ORDER by `date` DESC";
		$resultS = $conn->query($sql);
		mysqli_close($conn);
		return $resultS;
	}
	
	
	public static function addBooksItem($addname,$addautor,$addfoto){
		
		if ($addfoto==''){$addfoto='nofoto.png';}
	
		include(ROOT.'/config/db_config.php');
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		
	
				
		$sql = "INSERT INTO books (name, autor, foto)
VALUES ('$addname','$addautor','$addfoto')";
		
		if (mysqli_query($conn, $sql)) {
				echo "New record created successfully";
				} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		mysqli_close($conn);
	}
	
	
	public static function delById($id){
		include(ROOT.'/config/db_config.php');
		
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		
		
		
		$sql = "DELETE FROM `books`  WHERE id=$id";
		
		$resultS = $conn->query($sql);
		mysqli_close($conn);
		
	}
	
}