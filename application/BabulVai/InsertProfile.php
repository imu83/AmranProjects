<?php

include_once $_SERVER ['DOCUMENT_ROOT'] . '/AmranProjects/application/Utility/Functions.php';

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
	
	$myQuery = "insert into {$db_tbl_name}  
	(userID, userName, userMobile, userAddress, userEmail)
	VALUES (
	'{$validList [0]}', '{$validList [1]}',
	'{$validList [2]}', '{$validList [3]}', 
	'{$validList [4]}')";
	
	$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
	
	$myQuery = "SELECT * FROM {$db_tbl_name} where userID = '{$validList [0]}'";
	$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
	
	PrintAsJson ( $resultSet );
	// PrintToHTML ( $resultSet );
	
	mysql_free_result ( $resultSet );
}

?>