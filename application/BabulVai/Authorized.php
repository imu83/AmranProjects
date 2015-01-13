<?php
include_once 'Utility/Functions.php';

$parameterList = array (
		"uid" 
);

list ( $validList, $invalidList ) = ValidateParamaters ( $parameterList );

if (sizeof ( $invalidList ) > 0) {
	echo $invalidList [0];
} else {
	
	SetupConnectionToDB ();
	$db_tbl_name = 'profiles';
	
	$myQuery = "select * from {$db_tbl_name}  
	where userID = '{$validList [0]}'";
	
	$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
	// $aRow = mysql_fetch_assoc ( $resultSet );
	
	if (mysql_num_rows ( $resultSet ) > 0) {
		PrintAsJsonWithTableNameSingleObject ( $resultSet, $db_tbl_name );
	} else {
		PrintAsJsonFailed ();
	}
}
?>