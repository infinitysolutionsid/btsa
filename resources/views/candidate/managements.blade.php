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
                        <th></th>
                        <th>Posisi</th>
                        <th>Nama Pelamar</th>
                        <th>Email</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Tanggal masuk kerja</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if(!$candidate->isEmpty())
                    @php $no =1; @endphp
                    @foreach($candidate as $cnd)
                    <tr data-toggle="collapse" data-target="#{{$cnd->candidate_id}}" class="accordion-toggle"
                        aria-controls="{{$cnd->candidate_id}}">
                        <th scope="row"><span style="color:green;" data-toggle="tooltip" data-placement="top"
                                title="Lihat data lengkap {{$cnd->nama_lengkap}}"><i class="fas fa-eye"></i></span>
                        </th>
                        <td>{{$cnd->appliedposition}}</td>
                        <td><strong>{{$cnd->nama_lengkap}}</strong></td>
                        <td>{{$cnd->email}}</td>
                        <td>{{$cnd->tempat_lahir}}, {{$cnd->tanggal_lahir}}</td>
                        <td>{{$cnd->req_datein}}</td>
                        <td><a href="/candidate/managements/{{$cnd->candidate_id}}/delete"><button
                                    class="btn btn-rounded btn-danger"><span style="font-size: 12px;">
                                        <i class="fas fa-trash"></i></span></button></a></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="hiddenRow text-left">
                            <div class="accordion-body collapse" id="{{$cnd->candidate_id}}">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <h5>Data lengkap Pelamar <strong>{{$cnd->nama_lengkap}}</strong></h5>
                                        </tr>
                                        <td>Lahir di {{$cnd->tempat_lahir}}, {{$cnd->tanggal_lahir}}<br>Suku
                                            {{$cnd->suku}}
                                            <br>Agama {{$cnd->agama}}
                                            <br>Mempunyai golongan darah {{$cnd->golongandarah}}
                                            <br>dan merupakan anak ke-{{$cnd->anak_ke}} <br></td>
                                        <td>
                                            Ber alamat tempat tinggal di {{$cnd->alamatKtp}}
                                            <br>Status kepemilikan rumah {{$cnd->statusrumah}}
                                            <br>Dapat info lowongan kerja dari {{$cnd->info_lowongan}}
                                            <br>Bersedia masuk kerja tanggal {{$cnd->req_datein}}
                                            <br>Gaji yang diharapkan senilai {{$cnd->income}}
                                        </td>
                                        <td>

                                            <strong>Info kontak</strong> |
                                            <img src="{{asset('file/img/'.$cnd->profilephoto)}}" class="imgcandidate">
                                            <br>Email aktif: <a href="mailto:{{$cnd->email}}">{{$cnd->email}}</a>
                                            <br>Nomor telepon aktif: <a href="tel:{{$cnd->noHp}}">{{$cnd->noHp}}</a>
                                            <br>Download dokumen pendukung pelamar dibawah ini:
                                            <br>
                                            <a href="{{asset('file/cod/ktp/'.$cnd->ktpfile)}}" download title="KTP"><i
                                                    class="fas fa-id-card fa-2x"></i></a>
                                            <a href="{{asset('file/cod/sim/'.$cnd->simfile)}}" download title="SIM"><i
                                                    class="fas fa-address-card fa-2x"></i></a>
                                            <a href="{{asset('file/cod/'.$cnd->file_cv)}}" title="CV" download><i
                                                    class="fas fa-file-alt fa-2x"></i></a>
                                        </td>
                                    </thead>
                                </table>
                            </div>
                        </td>
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
@endsection
