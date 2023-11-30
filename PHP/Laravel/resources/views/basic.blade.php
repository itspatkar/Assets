<h1>Blade Basics</h1>

{{ 'Hello World' }}

<br><br>

{{ 3 + 7 }}

<br><br>

{{ '<h1>Test 1</h1>' }}

{!! '<h1>Test 2</h1>' !!}

{{-- I'm Comment --}}

@php
    $name = "I'm Mandar Patkar";
@endphp
{{ $name }}

@php
    $skills = ['Android', 'Web', 'DevOps', 'Cloud'];
@endphp

<h3>Skills:</h3>
<ul>
    @foreach ($skills as $val)
        @if ($loop->first)
            <li style="color: red">{{ $loop->index . ' - ' . $val }}</li>
        @elseif ($loop->last)
            <li style="color:green">{{ $loop->index . ' - ' . $val }}</li>
        @else
            <li>{{ $loop->index . ' - ' . $val }}</li>
        @endif
    @endforeach
</ul>
