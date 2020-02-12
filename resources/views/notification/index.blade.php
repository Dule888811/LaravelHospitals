@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif

    @foreach($notifications as $notification)
     <div>
        <p>{{$notification['notification_content']}}</p>
         <form action ="{{route('notification.seen',$notification['id'])}}"method="POST">
             @csrf
             @if($notification['seen'] == 0)
             <button type="submit">Seen</button>
              @endif
         </form>
     </div>
    @endforeach

@endsection