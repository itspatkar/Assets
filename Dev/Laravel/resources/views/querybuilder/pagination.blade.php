<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Students Portal Paginate</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="container">
        <div class="container">
            <h2 class="p-5 text-center">STUDENTS</h2>

            <div class="m-3">
                <a href="{{ url('/querybuilder/createform') }}" class="btn btn-success btn-sm">Add Student</a>
                <a href="{{ route('truncate') }}" class="btn btn-danger btn-sm">Delete All</a>
            </div>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
                @foreach ($data as $id => $students)
                    <tr>
                        <td>{{ $students->id }}</td>
                        <td>{{ $students->name }}</td>
                        <td>{{ $students->email }}</td>
                        <td>{{ $students->age }}</td>
                        <td>{{ $students->city }}</td>
                        <td>
                            <a href="{{ route('read', $students->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('updateform', $students->id) }}" class="btn btn-warning btn-sm">Update</a>
                            <a href="{{ route('delete', $students->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="m-3">{{ $data->links() }}</div>
            {{-- <div class="m-3">{{ $data->links('pagination::bootstrap-5') }}</div> --}}

        </div>
    </div>
</body>

</html>
