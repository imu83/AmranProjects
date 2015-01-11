<html>
<body>

<?php
include_once 'Functions.php';

$db_tbl_name = 'cars';

$dbConnection = SetupConnectionToDBAndReturn ();

$sql = "INSERT INTO {$db_tbl_name} (name, year)
VALUES ('200', '2000')";

if (mysql_query ( $sql )) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error ( $conn );
}

$myQuery = "SELECT id, name, year FROM {$db_tbl_name}";
$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );

PrintToHTML ( $resultSet );

mysql_close ( $dbConnection );

?>

<a href="Hello3.php">Delete 200 named value from db</a>

</body>
</html>


