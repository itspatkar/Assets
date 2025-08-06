<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Add New Student</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h2 class="p-5 text-center">Add New Student</h2>

        {{-- Laravel Errors
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif --}}

        <div class="container mx-5">
            <form method="post" action="{{ route('storeStudent') }}">
                @csrf

                @php
                    $passvar = 'Test';
                @endphp

                <x-input type="text" name="name" :passvar="$passvar" />
                <x-input type="email" name="email" />
                <x-input type="number" name="age" />
                <x-input type="text" name="city" />

                {{-- <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text" for="name"><b>Name</b> </label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            value="{{ old('name') }}" autofocus required>
                    </div>
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text" for="email"><b>Email</b> </label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            value="{{ old('email') }}" required>
                    </div>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text" for="age"><b>Age</b> </label>
                        <input class="form-control @error('age') is-invalid @enderror" type="number" name="age"
                            value="{{ old('age') }}" required>
                    </div>
                    <span class="text-danger">
                        @error('age')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text" for="city"><b>City</b> </label>
                        <input class="form-control @error('city') is-invalid @enderror" type="text" name="city"
                            value="{{ old('city') }}" required>
                    </div>
                    <span class="text-danger">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </span>
                </div> --}}

                <div>
                    <input type="submit" class="btn btn-success btn-sm" name="submit" value="Submit">
                    <a type="button" class="btn btn-info btn-sm" href="{{ route('home') }}">Home</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
