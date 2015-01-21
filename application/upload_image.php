<?php
if (isset ( $_POST ['submit'] )) {
	mysql_connect ( "localhost", "amran", "" );
	mysql_select_db ( "examples" );
	
	$imageName = mysql_real_escape_string ( $_FILES ["image"] ["name"] );
	$imageData = mysql_real_escape_string ( file_get_contents ( $_FILES ["image"] ["tmp_name"] ) );
	
	$imageType = substr ( $imageName, strlen ( $imageName ) - 3, strlen ( $imageName ) );
	
	if ($imageType == "jpg") {
		
		echo $imageName;
		// echo $imageData;
		
		mysql_query ( "INSERT INTO myimage (imagename, imagevalue) 
		VALUES('{$imageName}',{$imageData})" );
		
		if (mysql_affected_rows () > 0) {
			echo "image Uploaded!";
		}
	} else {
		echo "working code";
	}
}
?>
