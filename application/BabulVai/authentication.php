<?php
include_once 'Functions.php';

SetupConnectionToDB ();

$db_tbl_name = 'users';

if (isset ( $_POST ['userID'] )) {
	
	if (! empty ( $_POST ['userID'] )) {
		
		$id = $_POST ['userID'];
		$password = $_POST ['password'];
		
		$sql = "select from {$db_tbl_name} 
	 	where userID = '$id' and password = '$password'";
		
		$myQuery = "SELECT * FROM {$db_tbl_name} where userID = '{$id}' and password = '{$password}'";
		$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
		
		if (mysql_num_rows ( $resultSet ) > 0) {			
			mysql_free_result ( $resultSet );
			
			/* Redirect browser */
			header ( "Location: Authorized.html" );
			exit ();
		} else {
			header ( "Location: UnAuthorized.html" );
			exit ();
		}
	} else {
		echo "user id was empty";
	}
} else {
	echo "user id not set";
}

?>