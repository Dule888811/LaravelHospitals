@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif

    @foreach($notifications as $notification)
        <p>{{$notification['notification_content']}}</p>

    @endforeach

@endsection