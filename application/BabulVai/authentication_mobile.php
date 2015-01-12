<?php

// include_once $_SERVER ['DOCUMENT_ROOT'] . '/AmranProjects/application/Utility/Functions.php';
include_once '../Utility/Functions.php';
$parameterList = array (
		"uid",
		"password" 
);

list ( $validList, $invalidList ) = ValidateParamaters ( $parameterList );

if (sizeof ( $invalidList ) > 0) {
	echo $invalidList [0];
} else {
	
	SetupConnectionToDB ();
	$db_tbl_name = 'users';
	
	$myQuery = "SELECT * FROM {$db_tbl_name} where userID = '{$validList[0]}' and password = '{$validList[1]}'";
	$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
	
	if (mysql_num_rows ( $resultSet ) > 0) {
		mysql_free_result ( $resultSet );
		
		/* Redirect browser */
		header ( "Location: Authorized.php?uid={$validList[0]}" );
		exit ();
	} else {
		header ( "Location: UnAuthorized.php" );
		exit ();
	}
}

?>