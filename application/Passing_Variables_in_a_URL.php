<html>
<head>
<title>Query string</title>
</head>
<body>
	
	<?php
	include_once 'Functions.php';
	
	$parameterList = array (
			"name",
			"age" 
	);
	
	list ( $validList, $invalidList ) = ValidateParamaters ( $parameterList );
	
	if (sizeof ( $invalidList ) > 0) {
		echo $invalidList [0];
	} else {
		echo "<h1>Hello " . $validList [0] . "</h1>";
		echo "<h1>You are " . $validList [1] . " years old </h1>";
	}
	
	?>
	
	</body>
</html>