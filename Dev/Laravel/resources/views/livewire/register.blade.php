<div class="container">
    <div class="container m-5">
        @if (session('success'))
            <span class="text-success">{{ session('success') }}</span>
        @endif
        <form wire:submit="create" action="">
            <input wire:model="name" type="text" name="name" placeholder="Name">
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>

            <br><br>

            <input wire:model="email" type="email" name="email" placeholder="Email">
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>

            <br><br>

            <input wire:model="profile" type="file" name="profile" placeholder="Profile Pic" accept="image/png">
            <span class="text-danger">
                @error('profile')
                    {{ $message }}
                @enderror
            </span>

            <br><br>

            <input wire:model="password" type="password" name="password" placeholder="Password">
            <span class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            {{-- Loading States: --}}
            <div wire:loading.delay.longest wire:target="profile">
                <span class="text-success">Uploading...</span>
            </div>

            <br><br>

            <button wire:loading.remove>Create</button>
            <div class="text-center">
                @if ($profile)
                    <img class="rounded rounded-circle img-thumbnail" height="100px" width="100px"
                        src="{{ $profile->temporaryUrl() }}" alt="">
                @endif
            </div>
        </form>
    </div>
</div>
