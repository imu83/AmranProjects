<?php

//include_once $_SERVER ['DOCUMENT_ROOT'] . '/AmranProjects/application/Utility/Functions.php';
include_once '../Utility/Functions.php';

$db_tbl_name = 'cars';

$dbConnection = SetupConnectionToDBAndReturn();

$myQuery = "SELECT id, name, year FROM {$db_tbl_name}";
$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );

PrintAsJson ( $resultSet );
//PrintAsJsonWithTableName ( $resultSet, $db_tbl_name );

mysql_close ( $dbConnection );

?>