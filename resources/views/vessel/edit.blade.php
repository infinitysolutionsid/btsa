@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Edit Vessel Managements</h4>
    </div>
    <div class="card-body">
            @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Successfull!</strong> {{session('sukses')}}
            </div>
            @endif
        <form action="/vessel/{{$data_cat->vessel_id}}/update" method="POST">
                {{ csrf_field() }}
            <div class="basic-elements">
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                    <label for="vessel">Nama Vessel</label>
                            <input type="text" class="form-control" name="vessel" value="{{$data_cat->vessel}}" autofocus>
                            </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Vessel</button>
            </div>
        </form>
    </div>   
</div>
@endsection