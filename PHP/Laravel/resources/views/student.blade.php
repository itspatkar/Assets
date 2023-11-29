<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Student Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="p-4 text-center">Student Information</h1>
        <div class="jumbotron">
            <form method="post" name="submitForm" action="{{ route('submitForm') }}">
                @csrf
                <table>
                    <tbody>
                        <tr>
                            <td><b>Name:</b></td>
                            <td><input type="text" name="name" autofocus required></td>
                        </tr>
                        <tr>
                            <td><b>Birthdate:</b></td>
                            <td><input type="date" name="name" autofocus required></td>
                        </tr>
                        <tr>
                            <td><b>Gender:</b></td>
                            <td>
                                <input type="radio" name="gender" value="M" required> Male
                                <input type="radio" name="gender" value="F" required> Female
                            </td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td><input type="text" name="address" required></td>
                        </tr>
                        <tr>
                            <td><b>Certificates:</b></td>
                            <td><input type="file" name="certificates[]" multiple required></td>
                        </tr>
                        <tr>
                            <td><b>Marks:</b></td>
                            <td><input type="number" name="marks" min="1" max="100" required></td>
                        </tr>
                    </tbody>
                </table>

                <input type="submit" class="btn btn-success btn-sm m-3" name="submit" value="Submit">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</body>

</html>