<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Livewire</title>
</head>

<body class="antialiased">
    {{-- @livewire('clicker') --}}

    {{-- <livewire:clicker /> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                @livewire('register')
            </div>
            <div class="col">
                @livewire('register')
            </div>
        </div>
    </div>
</body>

</html>
