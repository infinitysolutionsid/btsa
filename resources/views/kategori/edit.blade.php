@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Edit Jadwal Kapal</h4>
    </div>
    <div class="card-body">
            @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Successfull!</strong> {{session('sukses')}}
            </div>
            @endif
        <form action="/jadwal/{{$data_cat->id}}/update" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                        <h5 class="modal-title" id="addjadwalkapal">Edit Data Jadwal Kapal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card-body">
                            <div class="basic-elements">
                                <div class="form-row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="kotaasal">Kota Asal</label>
                                            <input type="text" class="form-control" value="{{$data_cat->kotaasal}}" name="kotaasal" autofocus>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">Kota Tujuan</label>
                                        <input type="text" class="form-control" name="kotatujuan" value="{{$data_cat->kotatujuan}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="vessel">Vessel</label>
                                            <select name="vessel" id="vessel" class="form-control">
                                                <option value="#" disabled selected>Select Vessel</option>
                                                @if(!$jad_ves->isEmpty())
                                                @foreach ($jad_ves as $vesselitem)
                                            <option value="@if  @endif">{{$vesselitem->vessel}}</option>
                                            @endforeach
                                            @else
                                            <option value="#" class="text-center" disabled>- No data vessel found -</option>
                                            @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="voy">VoY</label>
                                            <input type="text" class="form-control" name="voy" value="{{$data_cat->voy}}" autofocus>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="closingdate">Closing Date</label>
                                        <input type="text" class="form-control" name="closingdate" value="{{$data_cat->closingdate}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="etd">ETD</label>
                                            <input type="text" class="form-control" name="etd" value="{{$data_cat->etd}}" autofocus>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eta">ETA</label>
                                        <input type="text" class="form-control" name="eta" value="{{$data_cat->eta}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add new jadwal kapal</button>
                      </div>
            </form>
    </div>   
</div>
@endsection