@extends('jscript/layout')

@push('scripts')
    <script scr="jquery.js"></script>
    <script scr="bootstrap.js"></script>
@endpush

@section('info')
    @verbatim
        {{ msg }}
    @endverbatim
@endsection

@push('scripts')
    <script scr="vue.js"></script>
    var msg = "Hello World!";
@endpush
