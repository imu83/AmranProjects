<?php
include_once 'Utility/Functions.php';

SetupConnectionToDB ();

$db_tbl_name = 'users';

if (isset ( $_REQUEST ['uid'] )) {
	
	if (! empty ( $_REQUEST ['uid'] )) {
		
		$id = $_REQUEST ['uid'];
		$password = $_REQUEST ['upass'];
		
		$myQuery = "SELECT * FROM {$db_tbl_name} 
		where userID = '{$id}' and userPassword = '{$password}'";
		
		$resultSet = mysql_query ( $myQuery ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
		
		if (mysql_num_rows ( $resultSet ) > 0) {
			mysql_free_result ( $resultSet );
			
			/* Redirect browser */
			// header ( "Location: Authorized.php?uid={$id}" );
			// exit ();
			echo "autho";
		} else {
			// header ( "Location: UnAuthorized.php" );
			// exit ();
			echo "un-autho";
		}
	} else {
		echo "user id was empty";
	}
} else {
	echo "user id not set";
}

?>