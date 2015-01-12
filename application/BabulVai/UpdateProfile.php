<?php

//include_once $_SERVER ['DOCUMENT_ROOT'] . '/AmranProjects/application/Utility/Functions.php';
include_once '../Utility/Functions.php';

$parameterList = array (
		"uid",
		"uname",
		"umobile",
		"uaddress",
		"uemail" 
);

list ( $validList, $invalidList ) = ValidateParamaters ( $parameterList );

if (sizeof ( $invalidList ) > 0) {
	echo $invalidList [0];
} else {
	
	SetupConnectionToDB ();
	$db_tbl_name = 'profiles';
	
	$myQuery = "update {$db_tbl_name}
	set userName = '{$validList [1]}',
	userMobile = '{$validList [2]}', 
	userAddress = '{$validList [3]}',
	userEmail = '{$validList [4]}'
	where userID = '{$validList [0]}'";
	
	$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
	
	$myQuery = "SELECT * FROM {$db_tbl_name} where userID = '{$validList [0]}'";
	$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
	
	PrintAsJson ( $resultSet );
	
	mysql_free_result ( $resultSet );
}

?>