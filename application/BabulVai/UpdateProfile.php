<?php
include_once 'Utility/Functions.php';

$parameterList = array (
		"uid",
		"uname",
		"umobile",
		"uaddress",
		"uemail" 
);

$validList = ValidateParamaters ( $parameterList );

if (sizeof ( $validList ) == sizeof ( $parameterList )) {
	SetupConnectionToDB ();
	$db_tbl_name = 'profiles';
	
	$myQuery = "update {$db_tbl_name}
	set userName = '{$validList [1]}',
	userMobile = '{$validList [2]}', 
	userAddress = '{$validList [3]}',
	userEmail = '{$validList [4]}'
	
	where userID = '{$validList [0]}'";
	
	$resultSet = mysql_query ( $myQuery ) or die ( PrintAsJsonFailedWithMessage ( mysql_error () ) );
	
	$myQuery = "SELECT * FROM {$db_tbl_name} where userID = '{$validList [0]}'";
	$resultSet = mysql_query ( $myQuery ) or die ( PrintAsJsonFailedWithMessage ( mysql_error () ) );
	
	PrintAsJsonWithTableNameSingleObject ( $resultSet, $db_tbl_name );
	
	mysql_free_result ( $resultSet );
}

?>