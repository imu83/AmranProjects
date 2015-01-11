<?php
session_start ();
?>


<?php

$_SESSION ["favcolor"] = "green";
$_SESSION ["favanimal"] = "cat";

echo "Favorite color is: " . $_SESSION ["favcolor"] . ".<br/>";
echo "Favorite animal is: " . $_SESSION ["favanimal"] . ".<br/><br/>";

$_SESSION ["favcolor"] = "nothing...";
print_r ( $_SESSION );

session_unset ();
session_destroy ();

?>
