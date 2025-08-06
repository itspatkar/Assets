{{-- Include view file --}}
@include('directives.header')

<h1>Main Page</h1>


{{-- Include view with parameters --}}
@include('directives.print', ['text' => 'Hello World'])

@php
    $fruits = ['Apple', 'Mango', 'Orange', 'Banana'];
@endphp

@include('directives.print_array', ['fruits' => $fruits])


{{-- Include if exists --}}
@includeIf('page')


{{-- Include when condition true --}}
@php
    $name = 'Mandar';
@endphp

@includeWhen(!empty($name), 'directives.print_name', ['name' => $name])


{{-- Include unless condition false --}}
@includeUnless(empty($name), 'directives.print_name', ['name' => $name])


@include('directives.footer')
