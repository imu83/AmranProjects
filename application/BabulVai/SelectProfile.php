<?php

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
	
	$myQuery = "select * from {$db_tbl_name}  
	where userID = '{$validList [0]}'";
	
	$executionStatus = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
	
	if ( $executionStatus ) {
		PrintAsJson ($executionStatus);
	}
	else {
		PrintAsJsonFailed ();
	}
	
}

?>