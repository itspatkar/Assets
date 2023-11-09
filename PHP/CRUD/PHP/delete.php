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
            <h2 class="p-5 text-center">Employee Information</h2>

            <?php
            include "connection.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                $email = $_POST['email'];

                $status = true;

                $sql = "DELETE FROM employee WHERE email='$email'";
                if ($conn->query($sql) === TRUE) {
                    // Pass
                } else {
                    $status = false;
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $sql = "DELETE FROM education WHERE email='$email'";
                if ($conn->query($sql) === TRUE) {
                    // Pass
                } else {
                    $status = false;
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $sql = "DELETE FROM salaried WHERE email='$email'";
                if ($conn->query($sql) === TRUE) {
                    // Pass
                } else {
                    $status = false;
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $sql = "DELETE FROM selfemployed WHERE email='$email'";
                if ($conn->query($sql) === TRUE) {
                    // Pass
                } else {
                    $status = false;
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $sql = "DELETE FROM certificates WHERE email='$email'";
                if ($conn->query($sql) === TRUE) {
                    // Pass
                } else {
                    $status = false;
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                if ($status) {
                    echo "<h3>Employee deleted successfully.</h3>";
                } else {
                    echo "<h3>Employee deletion failed!</h3>";
                }
            }

            $conn->close();
            ?>

            <div class="text-center"><button type="button" class="btn btn-outline-primary "><a href="../index.php">HOME</a></button></div>
        </div>
    </div>
</body>

</html>