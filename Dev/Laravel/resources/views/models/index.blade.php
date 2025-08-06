<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Students Portal</title>

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
            <h2 class="p-4 text-center">STUDENTS PORTAL</h2>

            <div class="m-3">
                <a href="{{ route('createStudent') }}" class="btn btn-success btn-sm">Add Student</a>
                <a href="{{ route('deleteAll') }}" class="btn btn-danger btn-sm">Delete All</a>
                <div style="float: right">
                    <a href="{{ route('importPage') }}" class="btn btn-secondary  btn-sm">Import
                        Students</a>
                    <a href="{{ route('exportStudents') }}" class="btn btn-dark btn-sm">Export
                        Students</a>
                </div>

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
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->city }}</td>
                        <td>
                            <a href="{{ route('showStudent', $student->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('editStudent', $student->id) }}"
                                class="btn btn-warning btn-sm">Update</a>
                            <a href="{{ route('deleteStudent', $student->id) }}"
                                class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{-- <div class="m-3">{{ $data->links() }}</div> --}}
            {{-- <div class="m-3">{{ $data->links('pagination::bootstrap-5') }}</div> --}}

        </div>
    </div>
</body>

</html>
