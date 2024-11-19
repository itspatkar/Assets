
<!DOCTYPE html>
<html>
<body>

<?php
session_start();

# Echo session variables that were set on previous page -
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";

# show all the session variable values for a user session -
print_r($_SESSION);

# To change session variable, just overwrite it -

# Destroy session -
// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo "<br>All session variables are now removed, and the session is destroyed." 

?>

</body>
</html>
