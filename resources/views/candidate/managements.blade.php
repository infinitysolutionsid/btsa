@extends('layouts.layout')
@section('title','Candidate managements')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Candidate Managements</h4>
    </div>

    <div class="card-body">
        <div class="form-group">
            <a href="/candidate/managements" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                title="Reset Filter"><i class="fas fa-undo"></i></a>
            @foreach ($filter_candidate as $filter)
            <a href="/candidate/managements/?appliedposition={{$filter->available_position}}"
                class="btn btn-primary btn-sm">{{$filter->available_position}}</a>
            @endforeach
        </div>
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
                        <th>Posisi</th>
                        <th>Tanggal Melamar</th>
                        <th>Nama Pelamar</th>
                        <th style="display:none;">Suku</th>
                        <th style="display:none;">Agama</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$candidate->isEmpty())
                    @php $no =1; @endphp
                    @foreach($candidate as $cnd)
                    <tr>
                        <td>{{$cnd->appliedposition}}</td>
                        <td>{{date('d M Y', strtotime($cnd->created_at))}}</td>
                        <td><strong>{{$cnd->nama_lengkap}}</strong></td>
                        <td style="display:none">{{$cnd->suku}}</td>
                        <td style="display:none">{{$cnd->agama}}</td>
                        <td>{{$cnd->tempat_lahir}}, {{$cnd->tanggal_lahir}}</td>
                        <td><span data-toggle="modal" data-target="#detailpelamar{{$cnd->candidate_id}}">
                                <button type="button" class="btn btn-info btn-sm" title="Detail data pelamar"
                                    data-toggle="tooltip" data-placement="top">
                                    <span style="color:white;"><i class="fas fa-info-circle"></i> Data
                                        lengkap</span></button>
                            </span></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Button action">
                                @if($cnd->statusinterview!='interviewed' && auth()->user()->role != 'head')
                                <button type="button" class="btn btn-danger btn-sm" title="Hapus data pelamar"
                                    data-toggle="tooltip" data-placement="top"><a
                                        href="/candidate/managements/{{$cnd->candidate_id}}/delete">
                                        <span style="color:white;"><i class="fas fa-trash"></i></span></a></button>
                                <button type="button" class="btn btn-success btn-sm"
                                    title="Tandai sebagai yang sudah datang interview" data-toggle="tooltip"
                                    data-placement="top"><a
                                        href="/candidate/managements/{{$cnd->candidate_id}}/updateinterview">
                                        <span style="color:white;"><i class="fas fa-check"></i></span></a></button>
                                @else

                                @endif
                            </div>
                        </td>
                    </tr>
                    {{-- MODAL PELAMAR --}}
                    <div class="modal fade" id="detailpelamar{{$cnd->candidate_id}}" tabindex="-1" role="dialog"
                        aria-labelledby="#detailpelamar{{$cnd->candidate_id}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="#detailpelamar{{$cnd->candidate_id}}">Informasi lengkap
                                        {{$cnd->nama_lengkap}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-10 text-left">
                                                <h4>Informasi umum</h4>
                                                <p style="color: #121212;">
                                                    Nama lengkap : {{$cnd->nama_lengkap}}<br>
                                                    NIK : {{$cnd->NoKtp}}<br>
                                                    Tempat lahir : {{$cnd->tempat_lahir}}<br>
                                                    Tanggal Lahir : {{$cnd->tanggal_lahir}}<br>
                                                    Alamat KTP : {{$cnd->alamatKtp}}<br>
                                                    Alamat Tempat Tinggal Saat Ini : {{$cnd->alamatTinggal}}<br>
                                                    Status Tempat Tinggal : {{$cnd->statusrumah}}<br>
                                                    Suku : {{$cnd->suku}}<br>
                                                    Agama : {{$cnd->agama}}<br>
                                                    Golongan Darah : {{$cnd->golongandarah}}<br>
                                                    Anak ke : {{$cnd->anak_ke}}<br>
                                                </p>
                                                <h4>Informasi lainnya</h4>
                                                <p style="color: #121212;">
                                                    Posisi yang dilamar : {{$cnd->appliedposition}}<br>
                                                    Gaji yang diharapkan : {{$cnd->income}}<br>
                                                    Tanggal masuk yang diharapkan : {{$cnd->req_datein}}<br>
                                                    Informasi lowongan : {{$cnd->info_lowongan}}<br>
                                                </p>
                                                <h4>Informasi kontak</h4>
                                                <p style="color: #121212;">
                                                    Email : <a href="mailto:{{$cnd->email}}">{{$cnd->email}}</a><br>
                                                    Telepon : <a href="tel:{{$cnd->noHp}}">{{$cnd->noHp}}</a>
                                                </p>
                                                <h4>Dokumen tambahan</h4>
                                                <a
                                                    href="{{asset('file/doc/'.$cnd->nama_lengkap.'/ktp/'.$cnd->ktpfile)}}"><button
                                                        class="btn btn-secondary btn-sm" type="button">KTP</button></a>
                                                <a
                                                    href="{{asset('file/doc/'.$cnd->nama_lengkap.'/sim/'.$cnd->simfile)}}"><button
                                                        class="btn btn-secondary btn-sm" type="button">SIM</button></a>
                                                <a href="{{asset('file/doc/'.$cnd->nama_lengkap.'/'.$cnd->filecv)}}"><button
                                                        class="btn btn-secondary btn-sm" type="button">Curriculum
                                                        Vitae</button></a>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <img src="{{asset('file/img/'.$cnd->nama_lengkap.'/'.$cnd->profilephoto)}}"
                                                    alt="" style="width:90px; height:auto;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    @if($cnd->statusinterview!='interviewed' && auth()->user()->role != 'head')
                                    <button type="button" class="btn btn-danger btn-sm" title="Hapus data pelamar"
                                        data-toggle="tooltip" data-placement="top"><a
                                            href="/candidate/managements/{{$cnd->candidate_id}}/delete">
                                            <span style="color:white;"><i class="fas fa-trash"></i> Hapus
                                                data</span></a></button>
                                    <button type="button" class="btn btn-success btn-sm"
                                        title="Tandai sebagai yang sudah datang interview" data-toggle="tooltip"
                                        data-placement="top"><a
                                            href="/candidate/managements/{{$cnd->candidate_id}}/updateinterview">
                                            <span style="color:white;"><i class="fas fa-check"></i> Tandai sebagai yang
                                                sudah interview</span></a></button>
                                    @else

                                    @endif
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
            {{-- {{$candidate->links()}}
            Showing {{$candidate->currentPage()}} to {{$candidate->perPage()}} of {{$candidate->total()}} entries --}}
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#veseltab').DataTable();
    });

</script>
@endsection
