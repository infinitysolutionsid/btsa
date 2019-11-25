@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Member Managements</h4>
        <a href="#additem">
            <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right" data-toggle="modal" data-target="#additem">
            <span class="ti-plus"></span> Add Member
            </button>
        </a>
    </div>
    <div class="card-body">
            @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Successfull!</strong> {{session('sukses')}}
                  </div>
                  @endif
            <div class="table-responsive">
                    <table id="memberTables" class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$data_member->isEmpty())
                                
                                    @php $no = 1; @endphp
                                    @foreach($data_member as $dt_member)
                                    <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$dt_member->nama_lengkap}}</td>
                                    <td><span class="badge badge-primary">{{$dt_member->username}}</span></td>
                                    <td>{{$dt_member->email}}</td>
                                    <td>{{$dt_member->role}}</td>
                                    <td class="color-primary">{{$dt_member->status}}</td>
                                    <td><a href="/member/{{$dt_member->id}}/edit"><button class="btn btn-rounded btn-warning">Edit</button></a> <a href="/member/{{$dt_member->id}}/delete"><button class="btn btn-rounded btn-danger">Delete</button></a></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <td colspan="7" class="text-center">No data founded!</td>
                                
                            @endif
                        </tbody>
                    </table>
                </div>
    </div>
</div>
<script>
        $(document).ready( function () {
    $('#memberTables').DataTable();
} );
    </script>
<!-- Modal -->
<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="additem" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form action="/member/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                        <h5 class="modal-title" id="additem">Add Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card-body">
                            <div class="basic-elements">
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_lengkap" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Tipe user</label>
                                                <select name="role" id="role" class="form-control">
                                                    <option value="#" disabled selected>Select type of item</option>
                                                    <option value="administrator">Administrator</option>
                                                    <option value="member">Member</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="qty">Status</label>
                                                <div class="radio">
                                                    <label class="radio-inline"><input type="radio" name="status" value="active" disabled> Active</label>
                                                    <label class="radio-inline"><input type="radio" name="status" value="inactive" disabled checked> Inactive</label>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add new item</button>
                      </div>
            </form>
          </div>
        </div>
</div>

@endsection