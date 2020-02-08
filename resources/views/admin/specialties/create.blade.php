@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif

    <form action ="{{route('admin.specialties.store')}}" method="POST">
        {{csrf_field()}}
        <div class="form-input">
            <label for="specialtiy_name">Specialtiy name:
                <input type="text" name="specialtiy_name" id="specialtiy_name"></label>
                <input type="submit"  value="Create"><br/>
        </div>
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection