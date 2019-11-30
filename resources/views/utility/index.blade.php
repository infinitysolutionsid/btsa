@extends('layouts.layout')
@section('title','HRD Utility Managements')
@section('content')
<?php $tokens = str_random(30) ?>
<div class="row">
    {{-- KOTA MANAGEMENTS --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-title">
                <h4>Kota</h4>
                <a href="#tambahkota">
                    <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right"
                        data-toggle="modal" data-target="#tambahkota">
                        <span class="ti-plus"></span> Kota
                    </button>
                </a>
            </div>
            <div class="card-body">
                @if (session('sukseskota'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>Successfull!</strong> {{session('sukses')}}
                </div>
                @endif
                <div class="table-responsive">
                    <table id="citytab" class="table table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama kota</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!$city->isEmpty())
                            @php $no =1; @endphp
                            @foreach($city as $kota)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$kota->city_name}}</td>
                                <td>
                                    <a href="/hrd/{{$kota->city_id}}/delete/deletedatakota"><button
                                            class="btn btn-rounded btn-danger"><i class="fas fa-trash"></i></button></a>
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
    </div>
    <script>
        $(document).ready(function () {
            $('#citytab').DataTable({
                searching: false,
            });
        });

    </script>
    {{-- SUKU MANAGEMENTS --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-title">
                <h4>Suku</h4>
                <a href="#tambahsuku">
                    <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right"
                        data-toggle="modal" data-target="#tambahsuku">
                        <span class="ti-plus"></span> Suku
                    </button>
                </a>
            </div>
            <div class="card-body">
                @if (session('suksessuku'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>Successfull!</strong> {{session('sukses')}}
                </div>
                @endif
                <div class="table-responsive">
                    <table id="sukuTab" class="table table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama suku</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!$suku->isEmpty())
                            @php $no =1; @endphp
                            @foreach($suku as $sukuID)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$sukuID->nama_suku}}</td>
                                <td>
                                    <a href="/hrd/{{$sukuID->suku_id}}/delete/deletedatasuku"><button
                                            class="btn btn-rounded btn-danger"><i class="fas fa-trash"></i></button></a>
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
    </div>
    <script>
        $(document).ready(function () {
            $('#sukuTab').DataTable({
                searching: false,
            });
        });

    </script>
    {{-- AGAMA MANAGEMENTS --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-title">
                <h4>Agama</h4>
                <a href="#tambahagama">
                    <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right"
                        data-toggle="modal" data-target="#tambahagama">
                        <span class="ti-plus"></span> Agama
                    </button>
                </a>
            </div>
            <div class="card-body">
                @if (session('suksesagama'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>Successfull!</strong> {{session('sukses')}}
                </div>
                @endif
                <div class="table-responsive">
                    <table id="agamaTab" class="table table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Agama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!$agama->isEmpty())
                            @php $no =1; @endphp
                            @foreach($agama as $religion)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$religion->religion_name}}</td>
                                <td>
                                    <a href="/hrd/{{$religion->religion_id}}/delete/deletedataagama"><button
                                            class="btn btn-rounded btn-danger"><i class="fas fa-trash"></i></button></a>
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
    </div>
    <script>
        $(document).ready(function () {
            $('#agamaTab').DataTable({
                searching: false,
            });
        });

    </script>
</div>
{{-- Baris baru --}}
<div class="row">
    {{-- Lowongan tersedia --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Lowongan tersedia</h4>
                <a href="#tambahlowongan">
                    <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right"
                        data-toggle="modal" data-target="#tambahlowongan">
                        <span class="ti-plus"></span> Lowongan tersedia
                    </button>
                </a>
            </div>
            <div class="card-body">
                @if (session('suksesloker'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>Successfull!</strong> {{session('sukses')}}
                </div>
                @endif
                <div class="table-responsive">
                    <table id="lowonganTab" class="table table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Posisi lowongan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!$lowongan->isEmpty())
                            @php $no =1; @endphp
                            @foreach($lowongan as $loker)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$loker->available_position}}</td>
                                <td>
                                    <a href="/hrd/{{$loker->loker_id}}/delete/deletedatalowongan"><button
                                            class="btn btn-rounded btn-danger"><i class="fas fa-trash"></i></button></a>
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
    </div>
    <script>
        $(document).ready(function () {
            $('#lowonganTab').DataTable(
                searching: false,
            );
        });

    </script>
</div>
{{-- BARIS UNTUK MODAL TIAP TIAP MODUL --}}
<!-- Modal tambah kota -->
<div class="modal fade" id="tambahkota" tabindex="-1" role="dialog" aria-labelledby="tambahkota" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/utility/kota/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahkota">Tambah data kota</h5>
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
                                            <label for="kota">Nama Kota</label>
                                            <input type="text" class="form-control" name="city_name" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal tambah suku --}}
<div class="modal fade" id="tambahsuku" tabindex="-1" role="dialog" aria-labelledby="tambahsuku" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/utility/suku/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahsuku">Tambah data suku</h5>
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
                                            <label for="kota">Nama Suku</label>
                                            <input type="text" class="form-control" name="nama_suku" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal tambah agama --}}
<div class="modal fade" id="tambahagama" tabindex="-1" role="dialog" aria-labelledby="tambahagama" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/utility/agama/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahagama">Tambah data suku</h5>
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
                                            <label for="kota">Nama Agama</label>
                                            <input type="text" class="form-control" name="religion_name" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal tambah lowongan --}}
<div class="modal fade" id="tambahlowongan" tabindex="-1" role="dialog" aria-labelledby="tambahlowongan"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/utility/lowongan/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahlowongan">Tambah data lowongan</h5>
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
                                            <label for="kota">Posisi tersedia</label>
                                            <input type="text" class="form-control" name="available_position" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
