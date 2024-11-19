<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Read Operation</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        div {
            font-size: 1.5rem;
        }

        table {
            font-size: 1.25rem;
        }
    </style>
</head>

<body>
    <div>
        <div class="container">
            <h2 class="p-4 text-center">Employee Information</h2>
            <div class="jumbotron">
                <?php
                include "connection.php";

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                    $email = $_POST['email'];

                    $sql = "SELECT * FROM employee WHERE email='$email'";
                    $result = $conn->query($sql);

                    if ($result == TRUE) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<b>Name :</b> " . $row['name'] . "<br>";
                            echo "<b>DOB : </b> " . $row['dob'] . "<br>";
                            echo "<b>Gender : </b> " . $row['gender'] . "<br>";
                            echo "<b>State : </b> " . $row['state'] . "<br>";
                            echo "<b>City : </b> " . $row['city'] . "<br>";

                            echo "<b>Education : </b><br>";
                            $sql2 = "SELECT * FROM education WHERE email='$email'";
                            $result2 = $conn->query($sql2);
                            echo '<div class="table-scroll"><table class="table table-bordered table-striped"><thead><tr>';
                            echo "<th>Course</th>";
                            echo "<th>Year Of Compleetion</th>";
                            echo "</tr></thead>";
                            echo "<tbody>";
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<tr><td>" . $row2['education_name'] . "</td>";
                                echo "<td>" . $row2['year_of_completion'] . "</td></tr>";
                            }
                            echo "</tbody></table></div>";

                            echo "<b>Profession : </b> " . $row['profession'] . "<br>";
                            if ($row['profession'] == "Salaried") {
                                $sql3 = "SELECT * FROM salaried WHERE email='$email'";
                                $result3 = $conn->query($sql3);
                                while ($row3 = $result3->fetch_assoc()) {
                                    echo "<b>Company Name :</b> " . $row3['company_name'] . "<br>";
                                    echo "<b>Job Started : </b> " . $row3['job_date'] . "<br>";
                                }
                            } else {
                                $sql4 = "SELECT * FROM selfemployed WHERE email='$email'";
                                $result4 = $conn->query($sql4);
                                while ($row4 = $result4->fetch_assoc()) {
                                    echo "<b>Business Name :</b> " . $row4['business_name'] . "<br>";
                                    echo "<b>Business Location : </b> " . $row4['business_location'] . "<br>";
                                }
                            }

                            echo "<b>Email : </b> " . $row['email'] . "<br>";
                            echo "<b>Mobile Number : </b> " . $row['mobile'] . "<br>";
                        }
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

                $conn->close();
                ?>
            </div>

            <div class="text-center"><button type="button" class="btn btn-outline-primary "><a href="../index.php">HOME</a></button></div>
        </div>
    </div>
</body>

</html>