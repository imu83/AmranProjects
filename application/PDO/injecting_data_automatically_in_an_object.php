<?php
$servername = "localhost";
$dbname = "examples";
$username = "amran";
$password = "";

$data_source_name = "mysql:host=$servername;dbname=$dbname";

try {
	$connectionToDatabase = new PDO ( $data_source_name, $username, $password );
	
	$stmt = $connectionToDatabase->query ( "SELECT id, name, year FROM cars" );
	
	/* MAGIC HAPPENS HERE */
	$stmt->setFetchMode ( PDO::FETCH_INTO, new Student () );
	
	foreach ( $stmt as $student ) {
		echo $student->getNameYear () . '<br />';
	}
	
	$connectionToDatabase = null;
} catch ( PDOException $e ) {
	echo $e->getMessage ();
}
class Student {
	public $id;
	public $name;
	public $year;
	public function getNameYear() {
		return $this->id . '. ' . $this->name . ' ' . $this->year;
	}
}

?>