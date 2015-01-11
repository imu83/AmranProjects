<?php
function ValidateParamaters($parameterList) {
	$validList = array ();
	$invalidList = array ();
	
	foreach ( $parameterList as $parameterName ) {
		if (isset ( $_GET [$parameterName] )) {
			
			$parameterValue = $_GET [$parameterName];

			if (trim ( $parameterValue != "" )) {
				array_push ( $validList, $parameterValue );
			}			
			else {
				$parameterValue = "(any value in '{$parameterName}' parameter was not supplied)";
				array_push ( $invalidList, $parameterValue );
			}
		} else {
			$parameterValue = "('{$parameterName}' was not supplied as parameter)";
			array_push ( $invalidList, $parameterValue );
		}
	}
	return array($validList,$invalidList);
}
function SetupConnectionToDB() {
	$db_host = 'localhost';
	$db_user = 'amran';
	$db_pwd = '';
	
	$db_name = 'examples';
	$db_tbl_name = 'cars';
	
	if (! mysql_connect ( $db_host, $db_user, $db_pwd ))
		die ( "Can't connect to MySQL" );
	
	if (! mysql_select_db ( $db_name ))
		die ( "Can't select database" );
}
function SetupConnectionToDBAndReturn() {
	$db_host = 'localhost';
	$db_user = 'amran';
	$db_pwd = '';
	
	$db_name = 'examples';
	$db_tbl_name = 'cars';
	
	$aDbConnection = mysql_connect ( $db_host, $db_user, $db_pwd ) or die ( "Unable to connect to MySQL" );
	
	$selectDB = mysql_select_db ( $db_name, $aDbConnection ) or die ( "Could not select examples" );
	
	return $aDbConnection;
}
function PrintAsJson($resultSet) {
	$dataArray = array ();
	
	while ( $row = mysql_fetch_assoc ( $resultSet ) ) {
		$dataArray [] = array (
				'aRow' => $row 
		);
	}
	
	header ( 'Content-type: application/json' );
	
	echo json_encode ( array (
			'rows' => $dataArray 
	) );
}
function PrintAsJsonWithTableName($resultSet, $db_tbl_name) {
	$dataArray = array ();
	
	while ( $row = mysql_fetch_assoc ( $resultSet ) ) {
		$dataArray [] = array (
				substr($db_tbl_name, 0, -1) => $row
		);
	}
	
	header ( 'Content-type: application/json' );
	
	echo json_encode ( array (
			$db_tbl_name => $dataArray 
	) );
}
function PrintAsJsonWithTableName2($resultSet, $db_tbl_name) {
	$dataArray = array ();

	while ( $row = mysql_fetch_assoc ( $resultSet ) ) {
		$dataArray [] = array (
				substr($db_tbl_name, 0, -1) => $row
		);
	}

	header ( 'Content-type: application/json' );

	echo json_encode ( array (
			substr($db_tbl_name, 0, -1).'list' => $dataArray
	) );
}
function PrintToHTML($resultSet) {
	$fields_num = mysql_num_fields ( $resultSet );
	
	// Printing html header
	echo "<h3>Showing From Database: </h3>";
	
	// Printing html table
	echo "<table border='1'><tr>";
	// Printing html table header
	for($i = 0; $i < $fields_num; $i ++) {
		$field = mysql_fetch_field ( $resultSet );
		echo "<td>{$field->name}</td>";
	}
	echo "</tr>\n";
	
	// Printing html table data
	while ( $row = mysql_fetch_row ( $resultSet ) ) {
		echo "<tr>";
		foreach ( $row as $cell )
			echo "<td>$cell</td>";
		echo "</tr>\n";
	}
}
function PrintToHTMLWithTableName($db_tbl_name, $resultSet) {
	$fields_num = mysql_num_fields ( $resultSet );
	
	// Printing html header
	echo "<h3>Database Table Name: {$db_tbl_name}</h3>";
	
	// Printing html table
	echo "<table border='1'><tr>";
	// Printing html table header
	for($i = 0; $i < $fields_num; $i ++) {
		$field = mysql_fetch_field ( $resultSet );
		echo "<td>{$field->name}</td>";
	}
	echo "</tr>\n";
	
	// Printing html table data
	while ( $row = mysql_fetch_row ( $resultSet ) ) {
		echo "<tr>";
		foreach ( $row as $cell )
			echo "<td>$cell</td>";
		echo "</tr>\n";
	}
}
function ConvertFromDDMMYYYYToYYYYMMDD($param) {
	$date = str_replace ( '/', '-', $param );
	return date ( 'Y-m-d', strtotime ( $date ) );
}
function ConvertFromMMDDYYYYToYYYYMMDD($param) {
	$date = str_replace ( '-', '/', $param );
	return date ( 'Y-m-d', strtotime ( $date ) );
}
function ConvertFromYYYYMMDDToDDMMYYYY($param) {
	$date = date ( "d-m-Y", strtotime ( $param ) );
	return $date;
}

?>