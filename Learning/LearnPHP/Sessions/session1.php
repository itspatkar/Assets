<html>
<body>

<?php

/* A session is way to store information (in variables) to be used across multiple pages.
Unlike a cookie, the information is not stored on the users computer.

- Syntax:
session_start();
// Set session variables
$_SESSION["session_name"] = "session_value";

The session_start() function must be the very first thing in your document. Before any HTML tags.
*/

session_start();
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";

?>

</body>
</html>
