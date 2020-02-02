@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div class="list">
                @foreach($specialties as $specialty)
                    @if($specialty->active == 1)
                      
                        <ul class="ul-products">
                            <li class="li-products"><a class="btn btn-primary" href ="{{route('admin.specialties.edit',$specialty)}}">Edit</a> {{$specialty->name}}<a class="btn btn-primary"  href ="{{route('admin.specialties.delete',$specialty->id)}}">Delete</a></li>
                        </ul>

                    @endif
                @endforeach
    </div>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection