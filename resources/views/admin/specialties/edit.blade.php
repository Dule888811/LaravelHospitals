@extends('layouts.app')
@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.specialties.update',$specialty)}}" method="POST">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="form-input">
            <label for="spec">Specialtiy name:
                <input type="text"   value="{{$specialty->title}}" name="spec" id="spec"></label>
            <input type="submit"  value="Update"><br/>
        </div>
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection