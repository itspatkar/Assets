@extends('jscript/layout')

@push('scripts')
    <script scr="ajax.js"></script>
@endpush

@push('style')
    <script scr="style.css"></script>
@endpush

@prepend('style')
    <style>
        body {
            color: green;
        }
    </style>
@endprepend
