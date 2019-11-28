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
                        <th>Tempat Tanggal Lahir</th>
                        <th>Suku - Agama</th>
                        {{-- <th>No KTP</th>
                        <th>No SIM</th>
                        <th>No NPWP</th>
                        <th>No BPJS</th>
                        <th>Golongan Darah</th>
                        <th>Anak ke</th>
                        <th>Alamat KTP</th>
                        <th>Alamat Tinggal</th>
                        <th>Status rumah</th>
                        <th>Info Lowongan</th> --}}
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
                        <td>{{$cnd->nama_lengkap}}</td>
                        <td>{{$cnd->email}}</td>
                        <td>{{$cnd->tempat_lahir}}, {{$cnd->tanggal_lahir}}</td>
                        <td>{{$cnd->suku}} - {{$cnd->agama}}</td>
                        <td>{{$cnd->req_datein}}</td>
                        <td>{{$cnd->income}}</td>
                        <td>{{$cnd->created_by}}</td>
                        <td><a href="/candidate/managements/{{$cnd->candidate_id}}/view"><button
                                    class="btn btn-rounded btn-success"><span style="font-size: 12px;">
                                        <i class="fas fa-eye"></i>
                                    </span></button></a> <a
                                href="/candidate/managements/{{$cnd->candidate_id}}/delete"><button
                                    class="btn btn-rounded btn-danger"><span style="font-size: 12px;">
                                        <i class="fas fa-trash"></i></span></button></a></td>
                    </tr>
                    @endforeach
                    @else
                    <td colspan="9" class="text-center">No data founded!</td>

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
