@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif

    <form action ="{{route('notification.store',$user)}}" method="POST">
        {{csrf_field()}}
        <div class="form-input">
            <label for="notification_content">Send notification:
                <input type="text" name="notification_content" id="notification_content"></label>
            <input type="submit"  value="Send"><br/>
        </div>
    </form>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection