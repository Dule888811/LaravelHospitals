@extends('layouts.app')
@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.specialties.deleted',$id)}}" method="POST">
        {{csrf_field()}}
        <div class="form-input">
            <label for="specialties_del">

            <input type="submit"  value="Delete"><br/>
        </div>
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection