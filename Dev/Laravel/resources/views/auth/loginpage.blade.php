<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login Page</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h2 class="p-5 text-center">User Login</h2>

        <div class="container mx-5">
            <form method="post" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text" for="email"><b>Email</b> </label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            value="{{ old('email') }}" autofocus required>
                    </div>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text" for="password"><b>Password</b> </label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                            name="password" value="{{ old('password') }}" required>
                    </div>
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div>
                    <input type="submit" class="btn btn-success btn-sm" name="submit" value="Login">
                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('register.page') }}">Register</a>
                    <a type="button" class="btn btn-info btn-sm" href="{{ route('auth') }}">Home</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
