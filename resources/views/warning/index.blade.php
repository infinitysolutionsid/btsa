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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if(!$notice->isEmpty())
                    @php $no =1; @endphp
                    @foreach($notice as $item)
                    <tr>
                        <td>{{$item->from}}</td>
                        <td>{{$item->employee}}</td>
                        <td><button type="button" class="btn btn-primary btn-sm"
                                data-target="#detailwarning{{$item->id}}" data-toggle="modal">See details</button>
                        </td>
                        <td>Setujui</td>
                    </tr>
                    <!-- Modal Details -->
                    <div class="modal fade" id="detailwarning{{$item->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="detailwarning{{$item->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailwarning{{$item->id}}">Surat {{$item->type}} ke
                                        {{$item->employee}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
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
                                            <select name="to" class="form-control" required>
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
                                            <select name="employee" id="" class="form-control" required>
                                                @foreach ($user as $us)
                                                <option value="{{$us->nama_lengkap}}">{{$us->nama_lengkap}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="type">Type of notice</label>
                                            <select name="type" id="" class="form-control" required>
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
