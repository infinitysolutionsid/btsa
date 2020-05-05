@extends('layouts.layout')
@section('title','Member edit managements')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Edit Member Managements</h4>
    </div>
    <div class="card-body">
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Successfull!</strong> {{session('sukses')}}
        </div>
        @endif
        <form action="/member/{{$data_member->id}}/update" method="POST">
            {{ csrf_field() }}
            <div class="basic-elements">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap"
                                        value="{{$data_member->nama_lengkap}}" autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" value="{{$data_member->email}}"
                                        name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" value="{{$data_member->username}}" class="form-control"
                                        name="username">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" value="{{$data_member->un_password}}"
                                        name="password" id="password">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="role">Tipe user</label>
                                    <select name="role" id="role" class="form-control custom-select">
                                        <option value="#" disabled selected>Select type of item</option>
                                        <option value="administrator" @if($data_member->role=='administrator') selected
                                            @endif>Administrator</option>
                                        <option value="member" @if($data_member->role=='member') selected @endif>Member
                                        </option>
                                        <option value="legal" @if($data_member->role=='legal') selected @endif>Legal
                                        </option>
                                        <option value="hrd" @if($data_member->role=='hrd') selected @endif>HRD</option>
                                        <option value="head" @if($data_member->role=='head') selected @endif>Head (Issue
                                            Report)
                                        </option>
                                        <option value="it" @if($data_member->role=='it') selected @endif>IT (Issue
                                            Report)
                                        </option>
                                        <option value="umum" @if($data_member->role=='umum') selected @endif>Umum (Issue
                                            Report)
                                        </option>
                                        <option value="user" @if($data_member->role=='user') selected @endif>User (Issue
                                            Report)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <select name="jabatan" id="" class="form-control custom-select">
                                        <option value="staff">Staff</option>
                                        <option value="senior staff">Senior Staff</option>
                                        <option value="spv">Supervisor</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="divisi">Divisi</label>
                                    <select name="divisi" id="divisi" class="form-control custom-select">
                                        <option value="Ekspor" @if($data_member->divisi=='Ekspor') selected
                                            @endif>Ekspor</option>
                                        <option value="Impor" @if($data_member->divisi=='Impor') selected @endif>Impor
                                        </option>
                                        <option value="Trucking" @if($data_member->divisi=='Trucking') selected
                                            @endif>Trucking
                                        </option>
                                        <option value="Antar-Pulau" @if($data_member->divisi=='Antar-Pulau') selected
                                            @endif>Antar-Pulau</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="kantor">Kantor</label>
                                    <select name="kantor" id="kantor" class="form-control custom-select">
                                        <option value="Medan - Blok B" @if($data_member->kantor=='Medan - Blok B')
                                            selected
                                            @endif>Medan - Blok B</option>
                                        <option value="Medan - Blok C" @if($data_member->kantor=='Medan - Blok C')
                                            selected
                                            @endif>Medan - Blok C
                                        </option>
                                        <option value="Belawan" @if($data_member->kantor=='Belawan') selected
                                            @endif>Belawan
                                        </option>
                                        <option value="Siombak" @if($data_member->kantor=='Siombak') selected
                                            @endif>Siombak</option>
                                        <option value="Jakarta" @if($data_member->kantor=='Jakarta') selected
                                            @endif>Jakarta</option>
                                        <option value="Surabaya" @if($data_member->kantor=='Surabaya') selected
                                            @endif>Surabaya</option>
                                        <option value="Palembang" @if($data_member->kantor=='Palembang') selected
                                            @endif>Palembang</option>
                                        <option value="Makassar" @if($data_member->kantor=='Makassar') selected
                                            @endif>Makassar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control custom-select">
                                <option value="active" @if($data_member->status=='active') selected @endif>Active
                                </option>
                                <option value="inactive" @if($data_member->status=='inactive') selected
                                    @endif>Inactive
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Member Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
