@extends('directives.inherit.layouts.masterlayout')

@section('title')
    Home Page
@endsection

@section('content')
    <h2>This is Home Content</h2>
    <p>This is paragraph</p>
@endsection

@section('info')
    <h2>This is Info Content</h2>
    <p>This is paragraph</p>
@endsection

@section('dynamic')
    @parent
    <p>Home - This content is dynamic</p>
@endsection
