@extends('directives.inherit.layouts.masterlayout')

@section('title')
    About Page
@endsection

@section('content')
    <h2>This is About Content</h2>
    <p>This is paragraph</p>
@endsection

@section('info')
    <h2>This is Info Content</h2>
    <p>This is paragraph</p>
@endsection

@section('dynamic')
    @parent
    <p>About - This content is dynamic</p>
@endsection
