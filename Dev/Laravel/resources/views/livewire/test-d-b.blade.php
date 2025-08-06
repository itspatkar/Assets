<div class="container m-5">
    <div class="container">
        <form wire:submit="save">
            <input type="name" wire:model="name" placeholder="Name">

            <input type="email" wire:model="email" placeholder="Email">

            <input type="mobile" wire:model="mobile" placeholder="Mobile">

            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="container m-4">
        <h4>Records</h4>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->email }}</td>
                        <td>{{ $record->mobile }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
