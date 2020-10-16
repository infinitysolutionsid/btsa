@extends('layouts.layout')
@section('title','Blog Management')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Blog Management</h4>
        <a href="#addblog">
            <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right" data-toggle="modal"
                data-target="#addblog">
                <span class="ti-plus"></span> Add Blog
            </button>
        </a>
    </div>
</div>
@endsection
