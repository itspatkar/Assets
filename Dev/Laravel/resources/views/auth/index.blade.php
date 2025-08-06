<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Authorized Users</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h2 class="p-5 text-center">Authorized Users</h2>

        <div class="text-center p-3">
            @if (Str::length($email) > 0)
                You're logged in as <b>{{ $email }}</b>
            @endif
        </div>

        <div class="container mx-5">
            <table class="table table-bordered table-striped">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Email</th>
                </tr>
                @foreach ($auths as $auth)
                    <tr>
                        <td>{{ $auth->id }}</td>
                        <td>{{ $auth->email }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="text-center">
            <a type="button" class="btn btn-danger btn-sm" href="{{ route('logout') }}">Logout</a>
            <a type="button" class="btn btn-secondary btn-sm" href="{{ route('login.page') }}">Login</a>
            <a type="button" class="btn btn-primary btn-sm" href="{{ route('register.page') }}">Register</a>
            <a type="button" class="btn btn-info btn-sm" href="{{ route('auth') }}">Home</a>
        </div>
    </div>
</body>

</html>
