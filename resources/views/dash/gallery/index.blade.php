@extends('layouts.layout')
@section('title','Gallery System')
@section('content')
<section>
    <div class="container">
        @if(session('selamat'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>Well done!</strong> {{session('selamat')}}

                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<div class="card">
    <div class="card-title">
        <h4>Gallery System Management</h4>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <a href="{{route('view.album')}}">
                <div class="card bg-primary">
                    <div class="stat-widget-two">
                        <div class="stat-content">
                            <div class="stat-digit"><span style="color:#fff;"><i class="fas fa-plus"></i></span></div>
                            <div class="stat-text" style="color:#fff;">Add Album</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @foreach ($album as $albumget)
        <div class="col-lg-3">
            <a href="#">
                <div class="card">
                    <div class="stat-widget-two">
                        <div class="stat-content">
                            <div class="stat-text">{!!$albumget->nama_album!!}</div>
                            <div class="stat-digit">{{$albumget->photo->count()}} photos</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
