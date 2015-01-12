<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/AmranProjects/application/Utility/Functions.php';

$db_tbl_name = 'cars';

$dbConnection = SetupConnectionToDBAndReturn ();

$sql = "Delete from {$db_tbl_name} where id > 3";

if (mysql_query ( $sql )) {
	echo mysql_affected_rows()." Record Deleted successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysql_error ( $dbConnection );
}

$myQuery = "SELECT id, name, year FROM {$db_tbl_name}";
$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );

PrintToHTML ( $resultSet );

mysql_close ( $dbConnection );
?>

