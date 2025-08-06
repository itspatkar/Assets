<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Import Students</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h2 class="p-5 text-center">Import Students</h2>

        <div class="container text-center mx-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="post" action="{{ route('importStudents') }}" enctype="multipart/form-data">
                @csrf
                <div class="p-5">
                    <label for="sheet"><b>Import File: </b> </label>
                    <input type="file" name="sheet">
                </div>

                <input type="submit" class="btn btn-success btn-sm" name="submit" value="Import">
                <a type="button" class="btn btn-info btn-sm" href="{{ route('home') }}">Home</a>
            </form>
        </div>
    </div>
</body>

</html>
