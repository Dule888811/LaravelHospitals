@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div class="list">
        @foreach($users as $user)
            @if($user->is_admin != 1)
                <div  class="list-group">
                    <ul class="ul-products">
                        <li class="li-products">Doctor name: {{$user->name}}</li>
                        <li class="li-products">Doctor surname: {{$user->surname}}</li>
                        <li class="li-products">Doctor specialty: {{$user->specialty()->first()->name}}</li>
                        <li class="li-products">Doctor specialty: {{$user->hospital()->first()->name}}</li>
                    </ul>
                </div>
                <hr>
            @endif
        @endforeach
    </div>
    <hr>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection