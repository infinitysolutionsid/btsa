@extends('layouts.layout')
@section('title','Blog Management')
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
        <h4>Blog Management</h4>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <a href="{{route('view.blog')}}">
                <div class="card bg-primary">
                    <div class="stat-widget-two">
                        <div class="stat-content">
                            <div class="stat-digit"><span style="color:#fff;"><i class="fas fa-plus"></i></span></div>
                            <div class="stat-text" style="color:#fff;">Add Blog</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @foreach ($blog as $blog)
        <div class="col-lg-3">
            <a href="#">
                <div class="card">
                    <img class="card-img-top" src="{!!asset('media/blog/'.$blog->thumbnail)!!}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title">{{$blog->blog_title}}</h3>
                        <p class="card-text">{!!str_limit($blog->blog_desc, 10)!!}</p>
                        <a href="#" class="btn btn-primary btn-small mt-2"><span><i class="fas fa-globe"></i></span>
                            View
                            blog</a>
                        <a href="/dashboard/blog/trash/{{$blog->id}}" class="btn btn-danger btn-small mt-2"><span><i
                                    class="fas fa-trash"></i></span>
                        </a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
