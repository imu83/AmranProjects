<?php
include_once 'MySQLi_Functions.php';

$conn = SetupConnectionToDBAndReturn_Procedural ();

$sql = "INSERT INTO cars (name, year)
VALUES ('John', 'Doe')";

if (mysqli_query ( $conn, $sql )) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error ( $conn );
}

mysqli_close ( $conn );
?> 