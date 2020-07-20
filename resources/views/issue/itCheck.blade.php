@extends('layouts.layout')
@section('title','IT/PU Checked Managements')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Periksa tugas @if(auth()->user()->role=='it')<b>Bagian IT</b> @elseif(auth()->
            user()->role=='umum')<b>Bagian Umum</b> @elseif(auth()->user()->role=='hrd')<b>Bagian HRD</b> @else
            @endif</h4> <a href="#addIR">
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
            <table id="memberTables" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="30px">#</th>
                        <th>Pelapor</th>
                        <th>Tanggal</th>
                        <th width="50px">Ref.</th>
                        <th>Kendala</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$issueData->isEmpty())
                    @php $no = 1; @endphp
                    @foreach($issueData as $dt_issue)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$dt_issue->nama_lengkap}}</td>
                        <td><span class="badge badge-success">{{$dt_issue->tanggal}}</span></td>
                        <td><span class="badge badge-primary">{{$dt_issue->id}}</span></td>
                        <td><a data-toggle="modal" data-target="#modaldetails{{$dt_issue->}}"></a></td>
                        <td>
                            <div class="btn-group btn-group-toggle">
                                <span data-toggle="modal" data-target="#modaldetails{{$dt_issue->id}}">
                                    <button type="submit" class="btn btn-primary btn-outline" data-toggle="tooltip"
                                        data-placement="left" title="Lihat detail?">
                                        <span><i class="fas fa-info-circle"></i></span>
                                    </button>
                                </span>
                                <span data-toggle="modal" data-target="#modalSolusi{{$dt_issue->id}}">
                                    <button type="submit" class="btn btn-success btn-outline" data-toggle="tooltip"
                                        data-placement="left" title="Selesaikan!">
                                        <span><i class="far fa-check-circle"></i></span>
                                    </button>
                                </span>
                                {{-- </form> --}}
                                <form action="/itCheck/sementara/{{$dt_issue->id}}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-warning btn-outline" data-toggle="tooltip"
                                        data-placement="left" title="Tunda dulu deh.">
                                        <span><i class="far fa-pause-circle"></i></span>
                                    </button>
                                </form>
                                <form action="/itCheck/batal/{{$dt_issue->id}}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-outline" data-toggle="tooltip"
                                        data-placement="left" title="Batalkan!">
                                        <span><i class="far fa-times-circle"></i></span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    {{-- modal solusi --}}
                    <!-- Modal -->
                    <div class="modal fade" id="modalSolusi{{$dt_issue->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="modalSolusi{{$dt_issue->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form action="/itCheck/selesai/{{$dt_issue->id}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalSolusi{{$dt_issue->id}}">Masalah Antrian
                                            #{{$dt_issue->id}} sudah
                                            selesai?
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:#141414;">Pelapor: <b>{{$dt_issue->nama_lengkap}}</b> | Yang
                                            Menyetujui:
                                            <b>{{$dt_issue->approve}}</b> |
                                            Terselesaikan oleh <b>{{auth()->user()->nama_lengkap}}</b>
                                        </p>
                                        <textarea name="solusi" id="" cols="30" rows="10"
                                            placeholder="Ceritakan bagaimana cara kamu menyelesaikannya!"
                                            required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Finish This Issue</button>
                                    </div>
                                </form>
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


<!-- Modal -->
<div class="modal fade" id="addIR" tabindex="-1" role="dialog" aria-labelledby="addIR" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/queue/addnew" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kepada">Tujuan IR</label>
                                                <select name="tujuan" id="tujuan" class="form-control custom-select">
                                                    <option value="it">IT</option>
                                                    <option value="umum">Umum</option>
                                                    <option value="hrd">HRD</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kepada">Upload lampiran screenshot issue atau file</label>
                                                <input type="file" name="lampiran" id="" class="form-control">
                                            </div>
                                        </div>
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

<!-- Modal -->
@foreach($issueData as $dt_issue)
<div class="modal fade" id="modaldetails{{$dt_issue->id}}" tabindex="-1" role="dialog"
    aria-labelledby="#modaldetails{{$dt_issue->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="#modaldetails{{$dt_issue->id}}">Issue Detail
                    <b>#{{$dt_issue->id}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 text-left">
                        <b>Nama pelapor</b> {{$dt_issue->nama_lengkap}}<br>
                        <b>Kendala</b> {!!strip_tags($dt_issue->kendala)!!} <br><br>
                        <b>Telah diapprove oleh</b> {{$dt_issue->approve}}
                    </div>
                    @if(!$dt_issue->lampiran == '')
                    <div class="col-md-4 text-left">
                        <a target="_blank" href="file/lampiran/issue/{{$dt_issue->lampiran}}">
                            <img src=" file/lampiran/issue/{{$dt_issue->lampiran}}" style="max-width:200px;">
                        </a>
                    </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> @endforeach @endsection
