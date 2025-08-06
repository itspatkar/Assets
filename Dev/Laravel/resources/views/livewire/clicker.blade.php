<div>
    <h1>Hello World!</h1>

    <button wire:click="handleClick">Click Me</button>

    <h2>{{ $title }}</h2>

    <h3>Students Count = {{ count($students) }}</h3>

    <button wire:click="createStudent">Create Student</button>
</div>
