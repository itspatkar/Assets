<?php

require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $profilepic = $_POST['profilepic'];
    $profession = $_POST['profession'];
    $company_name = $_POST['companyname'];
    $job_date = $_POST['jobdate'];
    $business_name = $_POST['businessname'];
    $business_location = $_POST['businesslocation'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $education = $_POST["education"];
    $year_of_completion = $_POST["yearOfCompletion"];
    $certificates = $_POST["certificates"];

    // Employee
    $sql = "INSERT INTO employee (name, dob, gender, state, city, profilepic, profession, email, mobile) VALUES ('$name', '$dob', '$gender', '$state', '$city', '$profilepic', '$profession', '$email', '$mobile')";

    if ($conn->query($sql) === TRUE) {
        // Profession
        if ($profession == "Salaried") {
            $sql = "INSERT INTO salaried (email, company_name, job_date) VALUES ('$email', '$company_name', '$job_date')";
        } else {
            $sql = "INSERT INTO selfemployed (email, business_name, business_location) VALUES ('$email', '$business_name', '$business_location')";
        }
        if ($conn->query($sql) === TRUE) {
            // Pass
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Education
        for ($i = 0; $i < count($education); $i++) {
            $sql = "INSERT INTO education (email, education_name, year_of_completion) VALUES ('$email', '$education[$i]', '$year_of_completion[$i]')";
            if ($conn->query($sql) === TRUE) {
                // Pass
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Certificates
        for ($i = 0; $i < count($certificates); $i++) {
            $sql = "INSERT INTO certificates (cert_name, email) VALUES ('$certificates[$i]', '$email')";
            if ($conn->query($sql) === TRUE) {
                // Pass
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        echo "Employee added successfully.";
        header("Location: ../create.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
