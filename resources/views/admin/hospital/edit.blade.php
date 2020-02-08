@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.hospitals.edit')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-input">
            <label for="hospital_name">Hospital name:
                <input type="text"placeholder="{{$hospital->name}}" name="hospital_name" id="hospital_name"></label>
            <input type="submit"   value="Create"><br/>
        </div>
        <div class="form-input">
            <label for="image">Upload new picture</label>
            <input  type="file" name="image">
        </div>
        <input type="submit" value="Edit">
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection