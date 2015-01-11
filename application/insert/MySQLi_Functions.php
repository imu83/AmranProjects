<?php
function SetupConnectionToDBAndReturn_Object_oriented() {
	$servername = "localhost";
	$username = "amran";
	$password = "";
	$dbname = "examples";
	
	$conn = new mysqli ( $servername, $username, $password, $dbname );
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	return $conn;
}
function SetupConnectionToDBAndReturn_Procedural() {
	$servername = "localhost";
	$username = "amran";
	$password = "";
	$dbname = "examples";
	
	$conn = mysqli_connect ( $servername, $username, $password, $dbname );
	
	if (! $conn) {
		die ( "Connection failed: " . mysqli_connect_error () );
	}
	return $conn;
}
?>