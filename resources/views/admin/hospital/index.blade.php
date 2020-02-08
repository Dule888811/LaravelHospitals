@extends('layouts.app')
<style>
    .flex-container {
        margin-bottom: 11%;
        text-align: center;

    }
    .li-products{
        list-style-type : none;
        padding-bottom: 3%;
    }
    .hrli {
        border: 1px solid black;
    }
</style>
@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div class="list">
        @foreach($hospitals as $hospital)
            @if($hospital->active == 1)
            <div  class="flex-container">
            <ul class="ul-products">
                <li class="li-products">Hospital name: {{$hospital->name}}</li>
                <li class="li-products">Hospital serial number: {{$hospital->serial_number}}</li>
                <li class="li-products"><img width="30%" height="30%" src='data:image/jpeg; base64,{{$hospital->image}} '> </li>
                <li class="li-products"><a class="btn btn-primary"  href ="{{route('admin.hospitals.edit',$hospital->id)}}">Edit</a></li>
                <li class="li-products"><a class="btn btn-primary"  href ="{{route('admin.hospitals.delete',$hospital->id)}}">Delete</a></li>
                <li class="li-products"><a class="btn btn-primary"  href ="{{route('admin.users.index',$hospital->id)}}">See alll doctors</a></li>
                <li class="li-products"><a class="btn btn-primary"  href ="{{route('admin.users.create',$hospital->id)}}">Add doctor</a></li>
            </ul>
            </div>
            <hr class="hrli">
            @endif
        @endforeach
    </div>
    <hr>
       <a href ="{{route('admin.main')}}">Back to maintaining</a>
 @endsection