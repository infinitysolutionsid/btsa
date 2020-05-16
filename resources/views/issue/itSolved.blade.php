@extends('layouts.layout')
@section('title','IT Solved Issue')
@inject('IRModel', '\App\IRModel')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Tugas @if(auth()->user()->role=='it')<b>Bagian IT</b> @elseif(auth()->
            user()->role=='umum')<b>Bagian Umum</b> @elseif(auth()->user()->role=='hrd')<b>Bagian HRD</b> @else
            @endif yang telah selesai</h4>
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
                        <th>Tanggal selesai</th>
                        <th>Notes</th>
                        <th>Kendala</th>
                        <th style="text-align: right;">Solved by</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$issueData->isEmpty())

                    @php $no = 1; @endphp
                    @foreach($issueData as $dt_issue)
                    <tr>
                        <th scope="row">{{$no++}}</th>

                        <td><span class="badge badge-success">{{$dt_issue->tanggal}}</span></td>
                        <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#detailsissue{{$dt_issue->id}}">
                                <span><i class="fas fa-info-circle"></i> See details</span>
                            </button></td>
                        <td>{!!strip_tags(str_limit($dt_issue->kendala, $limit=100))!!}</td>
                        <td style="text-align:right;"><img class="media-object" src="{{$IRModel->getAvatar()}}">
                            {{$dt_issue->updated_by}}</td>
                    </tr> @endforeach @else <td colspan="7" class="text-center">No data founded!</td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#memberTables').DataTable({
            scrollY: 600,
        });
    });

</script>

<!-- Modal -->
@foreach($issueData as $dt_issue)
<div class="modal fade" id="detailsissue{{$dt_issue->id}}" tabindex="-1" role="dialog"
    aria-labelledby="#detailsissue{{$dt_issue->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="#detailsissue{{$dt_issue->id}}">Issue Detail
                    <b>#{{$dt_issue->id}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <p>
                        Nama pelapor: {{$dt_issue->nama_lengkap}}<br>
                        Waktu selesai: {{$dt_issue->tanggal}} {{$dt_issue->jam}}<br>
                        Kendala:<br>
                        {!!$dt_issue->kendala!!}
                    </p>
                    <hr>
                    <h4>Your solutions:</h4>
                    <p>{!!$dt_issue->solusi!!}</p>
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
                                            <option value="Umum">Umum</option>
                                            <option value="HRD">HRD</option>
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
