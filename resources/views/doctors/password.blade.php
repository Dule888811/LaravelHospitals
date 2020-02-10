@extends('layouts.app')
@section('content')
    <form action ="{{route('doktors.password')}}" method="POST">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="form-input">
            <label for="password">Please Enter your password:</label>
            <input type="text" name="password" id="password"></label>
            <input type="submit"   value="Enter"><br/>
        </div>
    </form>
@endsection