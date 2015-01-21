<?php
$target_path = "uploads/";

$target_path = $target_path . basename ( $_FILES ['file'] ['name'] );

if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
	echo "The file " . basename ( $_FILES ['file'] ['name'] ) . " has been uploaded.";
	ShowFileData ( $target_path );
} else {
	echo "There was an error uploading the file, please try again!";
}









function ShowFileData($param) {
	$myfile = fopen ( $param, "r" ) or die ( "Unable to open file!" );
	
	echo '<br\> showing file data: <br\>';
	
	// Output one line until end-of-file
	while ( ! feof ( $myfile ) ) {
		echo fgets ( $myfile ) . "<br>";
	}
	fclose ( $myfile );
}
?>