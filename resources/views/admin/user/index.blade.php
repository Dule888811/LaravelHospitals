@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div class="list">
        @foreach($users as $user)
            @if($user->role_id != 1)
                <div  class="flex-container">
                    <ul class="ul-products">
                        <li class="li-products">Hospital name: {{$user->name}}</li>
                        <li class="li-products">Hospital serial number: {{$user->specialties}}</li>
                    </ul>
                </div>
                <hr class="hrli">
            @endif
        @endforeach
    </div>
    <hr>
    <a href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection