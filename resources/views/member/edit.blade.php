@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Edit Member Managements</h4>
    </div>
    <div class="card-body">
            @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Successfull!</strong> {{session('sukses')}}
            </div>
            @endif
        <form action="/member/{{$data_member->id}}/update" method="POST">
                {{ csrf_field() }}
            <div class="basic-elements">
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" value="{{$data_member->nama_lengkap}}" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                            <input type="text" value="{{$data_member->username}}" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                            <input type="text" class="form-control" value="{{$data_member->email}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                            <input type="password" class="form-control" value="{{$data_member->password}}" name="password" readonly>
                            </div>
                            <div class="form-group">
                                <label for="role">Tipe user</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="#" disabled selected>Select type of item</option>
                                    <option value="administrator" @if($data_member->role=='administrator') selected @endif>Administrator</option>
                                    <option value="member" @if($data_member->role=='member') selected @endif>Member</option>
                                    <option value="legal" @if($data_member->role=='legal') selected @endif>Legal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="active" @if($data_member->status=='active') selected @endif>Active</option>
                                    <option value="inactive" @if($data_member->status=='inactive') selected @endif>Inactive</option>
                                </select>
                            </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Member Data</button>
            </div>
        </form>
    </div>   
</div>
@endsection