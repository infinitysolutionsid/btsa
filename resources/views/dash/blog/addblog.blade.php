@extends('layouts.layout')
@section('title','Blog Management')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Add Blog</h4>
    </div>
    <div class="row">
    </div>
    <div class="card-body">
        <form id="productnew" action="{{route('proses.blog')}}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12" id="">
                        <div class="form-group">
                            <small class="muted-text">Masukkan Thumbnail:</small>
                            <div class="input-group crl-group increment">
                                <input type="file" name="thumbnail" class="form-control" id="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" placeholder="Judul blog" name="blog_title" id="name" class="form-control"
                                required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="blog_desc" id="" cols="30" rows="30" placeholder="Write your blog here..."
                                required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save
                    changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
