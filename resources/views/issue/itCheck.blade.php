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
            <table id="memberTables" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelapor</th>
                        <th>Tanggal</th>
                        <th>Tiket no.</th>
                        <th>Kendala</th>
                        <th>Status</th>
                        <th>Approved by</th>
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
                        <td><span class="badge badge-success">{{$dt_issue->tanggal}}</span> {{$dt_issue->jam}}</td>
                        <td><span class="badge badge-primary">{{$dt_issue->id}}</span></td>
                        <td>{!!strip_tags($dt_issue->kendala)!!}</td>
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
                        <td>

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

<script>
    $(document).ready(function () {
        $('#memberTables').DataTable({
            scrollY: 600,
        });
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
                                            <option value="it">IT</option>
                                            <option value="umum">Umum</option>
                                            <option value="hrd">HRD</option>
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
