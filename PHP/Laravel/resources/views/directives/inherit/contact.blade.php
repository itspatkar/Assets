@extends('directives.inherit.layouts.masterlayout')

@section('title')
    Contact Page
@endsection

@section('content')
    <h2>This is Contact Content</h2>
    <p>This is paragraph</p>
@endsection

@section('dynamic')
    @parent
    <p>Contact - This content is dynamic</p>
@endsection
