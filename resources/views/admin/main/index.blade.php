@extends('layouts.app')
<style>
    .doctor{
        padding-left: 10%;
    }
</style>
@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
           <p class="doctor"><a class="btn btn-primary" href ="{{route('admin.users.index')}}">See all doctors</a>
            <p><a class="btn btn-primary" href ="{{route('admin.hospitals.index')}}">See all hospitals</a><spam>Hospitals</spam><a class="btn btn-primary" href ="{{route('admin.hospitals.create')}}">Add Hospital</a></p></br>
            <p><a class="btn btn-primary" href ="{{route('admin.specialties.index')}}">See all specialties</a><spam>Specialties</spam><a class="btn btn-primary" href ="{{route('admin.specialties.create')}}">Add Specialty</a></p></br>
            <a href="../../home">Back to home</a>
@endsection