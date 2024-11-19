<?php

require "connection.php";

$sql = "SELECT state_name FROM states";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['state_name'] . '">' . $row['state_name'] . '</option>';
    }
}
$conn->close();
