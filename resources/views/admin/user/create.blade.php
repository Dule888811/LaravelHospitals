@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.users.store')}}" method="POST">
        {{csrf_field()}}
        <div class="form-input">
            <label for="doctor_surname">Doctor name:</label>
                <input type="text" name="doctor_name" id="doctor_name"></label>
        </div>
        <div class="form-input">
            <label for="doctor_surname">Doctor surname:</label>
            <input type="text" name="doctor_surname" id="doctor_surname"></label>
        </div>
        <div class="form-input">
            <label for="doctor_address">Doctor address:</label>
            <input type="text" name="doctor_address" id="doctor_address"></label>
        </div>
        <div class="form-input">
            <label for="email">Doctor email:</label>
            <input type="text" name="email" id="email"></label>
        </div>
        <div class="form-input">
                <label for="specialty">Specialty:</label>
                <select id="specialty" name="specialty">
                    @foreach($specialties as $specialty)
                         @if($specialty->active == 1)
                             <option  value="{{$specialty->id}}">{{$specialty->name}}</option>
                        @endif
                    @endforeach

                </select>
        </div>
        <div class="form-input">
            <select id="hospital" name="hospital">
                    <option  value="{{$hospital_id}}" selected></option>
            </select>
        </div>
        <input type="submit"   value="Add doctor"><br/>
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection