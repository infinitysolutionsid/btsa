@extends('layouts.layout')
@inject('Member','\App\MemberModel')
@section('title','Direct Messages')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 text-left">
            <div class="card">
                <div class="user-active-scroll">
                    @foreach ($users as $users) .
                    <div class="user media select-media">
                        <img src="{{$Member->getAvatar()}}" alt="" class="img-useractive"><span id="verified">
                            <a class="btn-primary btn-sm btn-rounded">7</a>
                        </span>
                        <div class="media-body">
                            <p>{{$users->nama_lengkap}}</p>
                            <small>Lorem ipsum dolor sit amet consectetur...</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <h3>Messagesview</h3>
            </div>
        </div>
    </div>
</div>
@endsection
