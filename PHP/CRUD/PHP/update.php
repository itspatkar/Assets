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
    $sql = "UPDATE employee SET name='$name', dob='$dob', gender='$gender', state='$state', city='$city', profilepic='$profilepic', profession='$profession', email='$email', mobile='$mobile' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        // Profession
        if ($profession == "Salaried") {
            $sql = "UPDATE salaried SET email='$email', company_name='$company_name', job_date='$job_date' WHERE email='$email'";
        } else {
            $sql = "UPDATE selfemployed SET email='$email', business_name='$business_name', business_location='$business_location' WHERE email='$email'";
        }
        if ($conn->query($sql) === TRUE) {
            // Pass
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Education
        for ($i = 0; $i < count($education); $i++) {
            $sql = "UPDATE education SET email='$email', education_name='$education[$i]', year_of_completion='$year_of_completion[$i]' WHERE email='$email'";
            if ($conn->query($sql) === TRUE) {
                // Pass
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Certificates
        for ($i = 0; $i < count($certificates); $i++) {
            $sql = "UPDATE certificates SET cert_name='$certificates[$i]', email='$email' WHERE email='$email'";
            if ($conn->query($sql) === TRUE) {
                // Pass
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        echo "Employee information updated successfully.";
        header("Location: update_form.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
