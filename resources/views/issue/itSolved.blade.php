@extends('layouts.layout')
@section('title','IT Solved Issue')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>IT Solved Issues</h4>
        <a href="#addIR">
            <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right" data-toggle="modal"
                data-target="#addIR">
                <span class="ti-plus"></span> Request new IR
            </button>
        </a>
    </div>
    <div class="card-body">
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Successfull!</strong><br>
            <small>{{session('sukses')}}</small>
        </div>
        @endif
        <div class="table-responsive">
            <table id="memberTables" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelapor</th>
                        <th>Tanggal pelapor</th>
                        <th>Antrian No.</th>
                        <th>Kendala</th>
                        <th>Status</th>
                        <th>Checked by</th>
                        <th>Solved by</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$issueData->isEmpty())

                    @php $no = 1; @endphp
                    @foreach($issueData as $dt_issue)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$dt_issue->nama_lengkap}}</td>
                        <td><span class="badge badge-success">{{$dt_issue->tanggal}}</span> {{$dt_issue->jam}}</td>
                        <td><span class="badge badge-primary">{{$dt_issue->id}}</span></td>
                        <td>{{$dt_issue->kendala}}</td>
                        <td class="text-center">
                            @if($dt_issue->status=='Selesai')
                            <span style="font-size: 1rem; color: green;" title="Telah Selesai." data-toggle="tooltip"
                                data-placement="top"><i class="fas fa-check-circle"></i></span>
                            @elseif($dt_issue->status=='Belum Selesai')
                            <span style="font-size: 1rem; color: #e18a19;" title="Belum selesai! Kapan dikerjai?"
                                data-toggle="tooltip" data-placement="top"><i class="fas fa-pause-circle"></i></span>
                            @else
                            <span style="font-size: 1rem; color: red;" title="Udah dibatalin." data-toggle="tooltip"
                                data-placement="top"><i class="fas fa-times-circle"></i></span>
                            @endif
                        </td>
                        <td>{{$dt_issue->approve}}</td>
                        <td>{{$dt_issue->updated_by}}</td>
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
        $('#memberTables').DataTable();
    });

</script>
<!-- Modal -->
<div class="modal fade" id="addIR" tabindex="-1" role="dialog" aria-labelledby="addIR" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/queue/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="addIR">Tambah IR Baru</h5>
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
                                        <input type="text" class="form-control" name="nama_lengkap"
                                            value="{{auth()->user()->nama_lengkap}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="kepada">Tujuan IR</label>
                                        <select name="tujuan" id="tujuan" class="form-control custom-select">
                                            <option value="IT">IT</option>
                                            <option value="PU">PU</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Laporkan kendalanya:</label>
                                        <textarea name="kendala" id="kendala" class="form-control" cols="30" rows="10"
                                            autofocus></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Laporan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
