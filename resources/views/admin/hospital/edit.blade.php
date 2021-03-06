@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.hospitals.update',$hospital)}}" method="POST" enctype="multipart/form-data">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="form-input">
            <label for="hospital_name">Hospital name:</label>
                <input type="text" value="{{$hospital->name}}" name="hospital_name" id="hospital_name"></label>
        </div>
        <div class="form-input">
            <label for="image">Upload new picture</label>
            <input  type="file" name="imageHospital">
        </div>
        <input type="submit" value="Edit">
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection