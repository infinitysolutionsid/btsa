@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Candidate Managements</h4>
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
            <table id="veseltab" class="table table-hover ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelamar</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Suku - Agama</th>
                        <th>No KTP</th>
                        <th>No SIM</th>
                        <th>No NPWP</th>
                        <th>No BPJS</th>
                        <th>Golongan Darah</th>
                        <th>Anak ke</th>
                        <th>Alamat KTP</th>
                        <th>Alamat Tinggal</th>
                        <th>Status rumah</th>
                        <th>Info Lowongan</th>
                        <th>Tanggal masuk kerja</th>
                        <th>Gaji yang diharapkan</th>
                        <th>Log IP</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if(!$candidate->isEmpty())
                    @php $no =1; @endphp
                    @foreach($candidate as $cnd)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$cnd->vessel}}</td>
                        <td><a href="/vessel/{{$cnd->candidate_id}}/edit"><button
                                    class="btn btn-rounded btn-warning">Edit</button></a> <a
                                href="/vessel/{{$cnd->candidate_id}}/delete"><button
                                    class="btn btn-rounded btn-danger">Delete</button></a></td>
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
    $(document).ready(function () {
        $('#veseltab').DataTable();
    });

</script>
<!-- Modal -->
<div class="modal fade" id="addvessel" tabindex="-1" role="dialog" aria-labelledby="addvessel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/vessel/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="addvessel">Add Data Vessel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="basic-elements">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12">
                                            <label for="vessel">Nama Vessel</label>
                                            <input type="text" class="form-control" name="vessel" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data Vessel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
