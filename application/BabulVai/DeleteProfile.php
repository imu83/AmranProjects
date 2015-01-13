<?php

// include_once $_SERVER ['DOCUMENT_ROOT'] . '/AmranProjects/application/Utility/Functions.php';
include_once '../Utility/Functions.php';
$parameterList = array (
		"uid" 
);

list ( $validList, $invalidList ) = ValidateParamaters ( $parameterList );

if (sizeof ( $invalidList ) > 0) {
	echo $invalidList [0];
} else {
	
	SetupConnectionToDB ();
	$db_tbl_name = 'profiles';
	
	$myQuery = "delete from {$db_tbl_name}  
	where userID = '{$validList [0]}'";
	
	$executionStatus = mysql_query ( $myQuery ) or die ( PrintAsJsonFailedWithMessage ( mysql_error () ) );
	
	if ($executionStatus) {
		PrintAsJsonSuccess ();
	} else {
		PrintAsJsonFailed ();
	}
}

?>