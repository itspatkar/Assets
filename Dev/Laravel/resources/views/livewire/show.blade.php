<div class="container">
    <div class="comtainer">
        <h2 class="p-5 text-center">Student Information</h2>
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->city }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $students->links() }}
    </div>
</div>
