@extends('layouts.layout')
@section('title','Member managements')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Member Managements</h4>
        <a href="#additem">
            <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right" data-toggle="modal"
                data-target="#additem">
                <span class="ti-plus"></span> Add Member
            </button>
        </a>
    </div>
    <div class="card-body">
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
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

                        <th>Role</th>
                        <th>Status</th>
                        <th>Last login info</th>
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
                        <td>{{$dt_member->role}}</td>
                        <td class="text-center">
                            @if($dt_member->status=='active')
                            <span style="font-size: 1rem; color: green;"><i class="fas fa-check-circle"></i></span>
                            @else
                            <span style="font-size: 1rem; color: red;"><i class="fas fa-times-circle"></i></span>
                            @endif
                        </td>
                        <td class="text-left">
                            @if($dt_member->last_login=='')
                            <span style="font-size:1rem; color: red;"><i class="fas fa-exclamation-circle"></i> </span>
                            Never login
                            @else
                            {{$dt_member->last_login}}
                            @endif
                        </td>
                        <td><button class="btn btn-rounded btn-primary btn-sm" data-toggle="modal"
                                data-target="#detailsuser{{$dt_member->id}}"><i class="fas fa-info-circle"></i></button>
                            <a href="/member/{{$dt_member->id}}/edit"><button
                                    class="btn btn-rounded btn-warning btn-sm"><i class="fas fa-edit"></i></button></a>
                            <a href="/member/{{$dt_member->id}}/delete"><button
                                    class="btn btn-rounded btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="detailsuser{{$dt_member->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="detailsuser{{$dt_member->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailsuser{{$dt_member->id}}">Detail info
                                        {{$dt_member->nama_lengkap}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <h4>Informasi login</h4>
                                        <p>
                                            Username: {{$dt_member->username}}<br>
                                            Password: {{$dt_member->un_password}}<br>
                                            Login akun terakhir: @if($dt_member->last_login == 0) <span
                                                style="color:red; font-weight: 700;">Tidak pernah
                                                login. @else
                                                {{$dt_member->last_login}} @endif</span><br>
                                            Role Akun: {{$dt_member->role}}<br>
                                            Status user: @if($dt_member->status=='active') <span style="color:green;"><i
                                                    class="fas fa-circle"></i> Active</span> @else <span
                                                style="color:red;"><i class="fas fa-circle"></i> Not Active</span>
                                            @endif
                                        </p>
                                        <h4>Informasi umum</h4>
                                        <p>
                                            Nama lengkap: {{$dt_member->nama_lengkap}}<br>
                                            Email: {{$dt_member->email}}<br>
                                            Jabatan: {{$dt_member->jabatan}}<br>
                                            Akun ini dibuat pada: {{$dt_member->created_at}}<br>
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
    $(document).ready(function () {
        $('#memberTables').DataTable();
    });

</script>
<!-- Modal -->
<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="additem" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/member/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="additem">Add New Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="basic-elements">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control" id=""
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="role">Tipe user</label>
                                                <select name="role" id="role" class="form-control custom-select"
                                                    required>
                                                    <option disabled selected>Select type of item</option>
                                                    <option value="administrator">Administrator</option>
                                                    <option value="member">Member</option>
                                                    <option value="legal">Legal</option>
                                                    <option value="hrd">HRD</option>
                                                    <option value="head">Head (Issue Report)</option>
                                                    <option value="it">IT (Issue Report)</option>
                                                    <option value="umum">Umum (Issue Report)</option>
                                                    <option value="user">User (Issue Report)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="">Jabatan</label>
                                                <input type="text" name="jabatan" class="form-control" required>
                                                <small>Jangan menggunakan "Staff" diawal jabatan.</small>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="">Divisi</label>
                                                <select name="divisi" id="divisi" class="form-control custom-select"
                                                    required>
                                                    <option value="Ekspor">Ekspor</option>
                                                    <option value="Impor">Impor</option>
                                                    <option value="Trucking">Trucking</option>
                                                    <option value="Antar-Pulau">Antar-Pulau</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="">Kantor</label>
                                                <select name="kantor" id="kantor" class="form-control custom-select"
                                                    required>
                                                    <option value="Medan - Blok B">Medan - Blok B</option>
                                                    <option value="Medan - Blok C">Medan - Blok C</option>
                                                    <option value="Belawan">Belawan</option>
                                                    <option value="Siombak">Siombak</option>
                                                    <option value="Jakarta">Jakarta</option>
                                                    <option value="Surabaya">Surabaya</option>
                                                    <option value="Palembang">Palembang</option>
                                                    <option value="Makassar">Makassar</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah anggota baru</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
