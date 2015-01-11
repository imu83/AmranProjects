<?php
include_once 'MySQLi_Functions.php';

$conn = SetupConnectionToDBAndReturn_Object_oriented();

$sql = "INSERT INTO cars (name, year)
VALUES ('John', 'Doe')";

if ($conn->query ( $sql ) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close ();
?> 