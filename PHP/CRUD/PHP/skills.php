<?php

require "connection.php";

$sql = "SELECT skill_name FROM skills";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['skill_name'] . '">' . $row['skill_name'] . '</option>';
    }
}

$conn->close();
