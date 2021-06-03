<?php
	$servername = "localhost";
	$username =  "root";
	$password = "";
	$dbName = "test";
	
	//Make Connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	$sql = "SELECT id, vakgebied, vragen, bestanden FROM opdrachten";
	$result = mysqli_query($conn ,$sql);
	
	
	if(mysqli_num_rows($result) > 0){
		//show data for each row
		while($row = mysqli_fetch_assoc($result)){
			echo "ID:".$row['id'] . "|Vakgebied:".$row['vakgebied']. "|Vragen:".$row['vragen']. "|Bestanden:".$row['bestanden'] . ";";
		}
	}
	
	
	
	


?>