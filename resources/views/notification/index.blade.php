@extends('layouts.app')
<style>
    .notification{
        border: 1px solid black;
    }
    .centerN{
        text-align: center;
    }
</style>


@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    @if(count($notifications) == 0)
       <p>You don't have any notifications yet</p>
     @endif
    @foreach($notifications as $notification)
     <div class="centerN">
        <p>{{$notification['notification_content']}}</p>
         <form action ="{{route('notification.seen',$notification['id'])}}"method="POST">
             @csrf
             @if($notification['seen'] == 0)
             <button type="submit">Click when you read notification</button>
              @endif
             <hr class="notification">
         </form>
     </div>
    @endforeach

@endsection
