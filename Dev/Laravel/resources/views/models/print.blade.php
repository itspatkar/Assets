<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Student Information</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <style>
        .container {
            max-width: 700px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="comtainer">
            <h2 class="p-5 text-center">Student Information</h2>
            <div>
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <td>:&emsp; {{ $data->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:&emsp; {{ $data->email }}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>:&emsp; {{ $data->age }}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>:&emsp; {{ $data->city }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
