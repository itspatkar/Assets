<?php

require "connection.php";

$sql = "SELECT city_name FROM cities";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['city_name'] . '">' . $row['city_name'] . '</option>';
    }
}
$conn->close();
