<html>
<head>
<title>MySQL Table Viewer</title>
</head>
<body>
<?php
include_once 'Functions.php';

SetupConnectionToDB ();

$db_tbl_name = 'cars';

// sending query
$resultSet = mysql_query ( "SELECT * FROM {$db_tbl_name}" );
if (! $resultSet) {
	die ( "Query to show fields from table failed" );
}

PrintToHTML ( $resultSet );
// PrintToHTMLWithTableName ( $db_tbl_name, $resultSet );

mysql_free_result ( $resultSet );
?>
</body>
</html>