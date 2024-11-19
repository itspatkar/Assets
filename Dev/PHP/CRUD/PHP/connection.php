<?php

// Database Connection
$host = "localhost";
$username = "root";
$password = "";
$database = "crud_db";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    //echo "Connection Successful!";
}

/*
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["name"] . $row["gender"];
    }
} else {
    echo "Zero";
}
echo "Connection Successful!";
$conn->close();
*/
