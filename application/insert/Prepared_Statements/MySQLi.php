<!-- Example (MySQLi with Prepared Statements) -->

<?php
$servername = "localhost";
$username = "amran";
$password = "";
$dbname = "examples";

// Create connection
$conn = new mysqli ( $servername, $username, $password, $dbname );

// Check connection
if ($conn->connect_error) {
	die ( "Connection failed: " . $conn->connect_error );
}

// prepare and bind
$stmt = $conn->prepare ( "INSERT INTO cars (name, year) VALUES (?, ?)" );
$stmt->bind_param ( "ss", $name, $year );

// set parameters and execute
$name = "John";
$year = "Doe";
$stmt->execute ();

$name = "Mary";
$year = "Moe";
$stmt->execute ();

$name = "Julie";
$year = "Dooley";
$stmt->execute ();

echo "New records created successfully";

$stmt->close ();
$conn->close ();
?>


<!-- 

Code lines to explain from the example above:
"INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)"

In our SQL, we insert a question mark (?) where we want to substitute in an integer, string, double or blob value.

Then, have a look at the bind_param() function:
$stmt->bind_param("sss", $firstname, $lastname, $email);

This function binds the parameters to the SQL query and tells the database what the parameters are. The "sss" argument lists the types of data that the parameters are. The s character tells mysql that the parameter is a string.

The argument may be one of four types:

    i - integer
    d - double
    s - string
    b - BLOB

We must have one of these for each parameter.

By telling mysql what type of data to expect, we minimize the risk of SQL injections.
Note 	Note: If we want to insert any data from external sources (like user input), it is very important that the data is sanitized and validated.

 -->

