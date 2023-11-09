<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>CRUD Operation</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .list {
            margin: 1rem 10rem;
            padding: 15px;
            text-align: center;
            font-weight: 400;
        }

        .list-block {
            margin: 1rem;
            display: block;
            padding: 5px;
            border: 2px outset #1565c0;
            border-radius: 6px;
        }

        .list-block:hover {
            text-decoration: none;
            background-color: #d1d1d1;
        }
    </style>
</head>

<body>
    <div>
        <h1 class="p-5 text-center">EMPLOYEE MANAGEMENT</h1>

        <div class="container">
            <div class="jumbotron">
                <h3 class="text-center">Select Operation:</h3>
                <div class="list">
                    <a href="create.php" class="list-block">Add Employee (Create)</a>
                    <a href="read.php" class="list-block">Display Employee (Read)</a>
                    <a href="update.php" class="list-block">Update Employee (Update)</a>
                    <a href="delete.php" class="list-block">Remove Employee (Delete)</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>