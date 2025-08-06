<div class="container">
    <div class="container m-5">
        @if (session('success'))
            <span class="text-success">{{ session('success') }}</span>
        @endif
        <form wire:submit="createStudent" action="">
            <input wire:model="name" type="text" name="name" placeholder="Name">
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <input wire:model="email" type="email" name="email" placeholder="Email">
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
            <input wire:model="age" type="number" name="age" placeholder="Age">
            <span class="text-danger">
                @error('age')
                    {{ $message }}
                @enderror
            </span>
            <input wire:model="city" type="text" name="city" placeholder="City">
            <span class="text-danger">
                @error('city')
                    {{ $message }}
                @enderror
            </span>

            <button>Create</button>
        </form>
    </div>
</div>
