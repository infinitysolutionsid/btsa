@extends('layouts.layout')
@section('title','Warning Notice')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Warning Notice Managements</h4>

        <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5 float-right" data-toggle="modal"
            data-target="#addnotice">
            Request Warning Notice
        </button>
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
            <table id="legaltables" class="table table-hover ">
                <thead>
                    <tr>
                        <th>Dari</th>
                        <th>Karyawan yang diberi peringatan/teguran</th>
                        <th>Details</th>
                        <th>Ket.</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$notice->isEmpty())
                    @php $no =1; @endphp
                    @foreach($notice as $item)
                    <?php $getTo = $item->to ?>
                    <tr
                        class="@if($item->approved_by=='approved')table-success @elseif($item->approved_by=='confirmed')table-primary @endif">
                        <td>{{$item->created_by}}</td>
                        <td>{{$item->employee}}</td>
                        <td><button type="button" class="btn btn-primary btn-sm"
                                data-target="#detailwarning{{$item->id}}" data-toggle="modal">See details</button>
                        </td>
                        @if(auth()->user()->id!=$item->to)
                        <td>@if($item->approved_by=='unapproved')
                            Permintaan kamu belum disetujui
                            @elseif($item->approved_by=='approved' && auth()->user()->role!='hrd')
                            Permintaan kamu telah disetujui atasan kamu dan sudah diteruskan ke bagian HRD!
                            @elseif($item->approved_by=='approved' && auth()->user()->role=='hrd')
                            Telah disetujui atasan, dan kamu sudah boleh print surat
                            {{$item->type}}nya.
                            @elseif($item->approved_by=='confirmed')
                            Telah disetujui atasan, dan telah dikonfirmasi oleh HRD.
                            @endif</td>
                        @endif

                    </tr>
                    <!-- Modal Details -->

                    <div class="modal fade" id="detailwarning{{$item->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="detailwarning{{$item->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailwarning{{$item->id}}">Surat {{$item->type}} ke
                                        {{$item->employee}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <p>
                                            @if($item->approved_by=='approved' && auth()->user()->role!='hrd')
                                            <div class="alert alert-primary">
                                                Permintaan kamu telah disetujui atasan kamu dan sudah diteruskan ke
                                                HRD.<br>
                                                Jika ingin mengetahui kelanjutan dari permintaan surat kamu, kamu boleh
                                                bertanya kepada HRD secara langsung. Terima kasih.
                                            </div>
                                            @elseif($item->approved_by=='approved' && auth()->user()->role=='hrd')
                                            <div class="alert alert-primary">
                                                Permintaan dari {{$item->created_by}} telah disetujui oleh
                                                {{$item->nama_lengkap}}.<br>Mohon segera print surat {{$item->type}}nya,
                                                dan jangan lupa untuk konfirmasi jika sudah diperiksa dan dibuatkan.<br>
                                                Terima kasih ya. :)
                                            </div>
                                            @elseif($item->approved_by=='confirmed')
                                            <div class="alert alert-primary">
                                                Permintaan dari {{$item->created_by}} telah disetujui oleh
                                                {{$item->nama_lengkap}} dan juga telah dikonfirmasi oleh
                                                {{$item->confirmed_by}}. Jika belum menerima surat {{$item->type}} harap
                                                telepon ke bagian HRD ya.<br>Terima kasih ya.
                                            </div>
                                            @endif
                                            Pada tanggal {{date('d M Y', strtotime($item->created_at))}}, staff yang
                                            disebut dibawah ini:<br>
                                            Nama: {{$item->employee}}<br><br>
                                            Telah diberikan Surat {{$item->type}}, sehubungan staff telah melakukan
                                            pelanggaran sebagai berikut:
                                            <div class="text-uppercase">{!!$item->reason!!}</div><br>
                                            Apakah saya diberikan izin untuk memberikan Surat {{$item->type}} kepada
                                            karyawan yang bersangkutan?<br><br>
                                            Demikianlah surat {{$item->type}}, diajukan.<br>
                                            Medan, {{date('d M Y', strtotime($item->created_at))}}<br><br>
                                            <div class="row">
                                                <div class="col-6 text-left">
                                                    Diajukan oleh,<br>
                                                    Supervisor/Head Bagian<br><br>
                                                    {{$item->created_by}}
                                                </div>
                                                <div class="col-6 text-left">
                                                    Disampaikan kepada,<br>
                                                    Manager Bagian<br><br>
                                                    {{$item->nama_lengkap}}
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    @if(auth()->user()->id==$item->to && $item->approved_by=='unapproved')
                                    <form action="/approve-warning-notice/{{$item->id}}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" onclick="warningnotice_approve()"
                                            id="approve_btnwarningnotice" class="btn btn-primary">Setujui</button>
                                    </form>
                                    @elseif($item->approved_by=='approved' && auth()->user()->role!='hrd')
                                    <button class="btn btn-disabled">Surat ini telah disetujui.</button>
                                    @elseif($item->approved_by=='approved' && auth()->user()->role=='hrd')
                                    <form action="/checked-by-hrd/{{$item->id}}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">Konfirmasi telah
                                            diperiksa</button>
                                    </form>
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

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#legaltables').DataTable();
    });

</script>
<!-- Modal -->
<div class="modal fade" id="addnotice" tabindex="-1" role="dialog" aria-labelledby="addnotice" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/notice/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="addnotice">Warning Notice</h5>
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
                                        <div class="form-group col-sm-4">
                                            <label for="from">Requester</label>
                                            <h4>{{auth()->user()->nama_lengkap}}</h4>
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label for="file">Ditujukan kepada</label>
                                            <select name="to" class="form-control custom-select" required>
                                                @foreach ($headget as $head)
                                                <option value="{{$head->id}}">{{$head->nama_lengkap}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="form-group col-sm-9">
                                            <label for="employee">Nama Karyawan</label>
                                            <select name="employee" id="" class="form-control custom-select" required>
                                                @foreach ($user as $us)
                                                <option value="{{$us->nama_lengkap}}">{{$us->nama_lengkap}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="type">Type of notice</label>
                                            <select name="type" id="" class="form-control custom-select" required>
                                                <option value="Peringatan">Peringatan</option>
                                                <option value="Teguran">Teguran</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12">
                                            <label for="Berikan alasan:">Berikan alasan:</label>
                                            <textarea name="reason" class="form-control" id="" cols="30" rows="10"
                                                placeholder="Ketik disini..." required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Request Notice</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
