<!-- Example (PDO with Prepared Statements) -->

<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "examples";

try {
	$conn = new PDO ( "mysql:host=$servername;dbname=$dbname", $username, $password );
	// set the PDO error mode to exception
	$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
	// prepare sql and bind parameters
	$stmt = $conn->prepare ( "INSERT INTO cars (name, year)
    VALUES (:name, :year)" );
	$stmt->bindParam ( ':name', $name );
	$stmt->bindParam ( ':year', $year );
	
	// insert a row
	$name = "John";
	$year = "Doe";
	$stmt->execute ();
	
	// insert another row
	$name = "Mary";
	$year = "Moe";
	$stmt->execute ();
	
	// insert another row
	$name = "Julie";
	$year = "Dooley";
	$stmt->execute ();
	
	echo "New records created successfully";
} catch ( PDOException $e ) {
	echo "Error: " . $e->getMessage ();
}
$conn = null;
?> 