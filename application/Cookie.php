<?php
$cookie_name = "user";
$cookie_value = "amran";

/* Note: The setcookie() function must appear BEFORE the <html> tag. */
setcookie ( $cookie_name, $cookie_value, time () + (86400 * 30), "/" ); // 86400 = 1 day
?>

<html>
<body>

<?php
if (! isset ( $_COOKIE [$cookie_name] )) {
	echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
	echo "Cookie '" . $cookie_name . "' is set!<br>";
	echo "Value is: " . $_COOKIE [$cookie_name];
}
?>




<?php
setcookie ( "user", "", time () - 3600 );
?>


<?php
echo "Cookie 'user' is deleted.";
?>


<?php
if (count ( $_COOKIE ) > 0) {
	echo "Cookies are enabled.";	
} else {
	echo "Cookies are disabled.";
}
?>




</html>
</body>