@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.hospitals.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-input">
            <label for="hospital_name">Hospital name:
                <input type="text" name="hospital_name" id="hospital_name"></label>
            <input type="submit"   value="Create"><br/>
        </div>
        <div class="form-input">
            <label for="image">image</label>
            <input type="file" name="image">
        </div>
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection