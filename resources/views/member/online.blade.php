@extends('layouts.layout')
@section('title','Online users')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-text">
                <div class="row">
                    <div class="col-lg-5 text-left" style="padding-right:0px;">
                        <div class="media mb-4">
                            <h4>Online Users</h4>
                        </div>
                        <div class="scroll-user-active">
                            @foreach ($users as $user)
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="user media selectmed" id="{{$user->id}}">
                                        <img class="mr-2 img-messagesuser" src="{{asset('file/'.$user->profilephoto)}}"
                                            alt="{{$user->nama_lengkap}} picture.">
                                        <div class="media-body">
                                            <h6 class="mt-0">{{$user->nama_lengkap}}
                                                {{-- will show unread count --}}
                                                </h5>
                                                <p class="muted-text">{{$user->email}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center" style="margin-top: 10px;">
                                    <div class="statustrace">
                                        @if($user->isOnline())
                                        <li class="text-success"><span><i class="fas fa-circle"></i></span></li>
                                        @else
                                        <li class="text-danger"><span><i class="fas fa-circle"></i></span></li>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7" id="messages">
                        <div class="media mb-4">
                            <h4>Your Messages</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
π
