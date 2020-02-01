@extends('layouts.app')
@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <h2>Hello</h2>
    <a href="../../home">Back to home</a>
@endsection