@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div class="list">
        @foreach($users as $user)
            @if($user->is_admin != 1)
                <div  class="flex-container">
                    <ul class="ul-products">
                        <li class="li-products">Doctor name: {{$user->name}}</li>
                        <li class="li-products">Doctor specialty: {{$user->specialty}}</li>
                    </ul>
                </div>
                <hr class="hrli">
            @endif
        @endforeach
    </div>
    <hr>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection