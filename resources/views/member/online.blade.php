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
                            <h4>Direct Messages</h4>
                        </div>
                        <div class="scroll-user-active">
                            @foreach ($users as $user)
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="user media selectmed" id="{{$user->id}}">
                                        <img class="mr-2 img-messagesuser" src="{{asset('file/'.$user->profilephoto)}}"
                                            alt="{{$user->nama_lengkap}} picture.">
                                        @if($user->isOnline())
                                        <span class="text-success activeuser"><i class="fas fa-circle"></i></span>
                                        @else
                                        <span class="text-danger activeuser"><i class="fas fa-circle"></i></span>
                                        @endif
                                        <div class="media-body">
                                            <h6 class="mt-0 nametitle">{{$user->nama_lengkap}}
                                                </h5>
                                                <p class="muted-text">{{$user->email}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center" style="margin-top: 10px;">
                                    <div class="statustrace">
                                        {{-- <li class="text-primary countmsg">1</li> --}}
                                        <button class="btn btn-primary btn-circle btn-sm">5</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7" id="messages">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
