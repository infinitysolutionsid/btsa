@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Edit Legality Managements</h4>
    </div>
    <div class="card-body">
            @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Successfull!</strong> {{session('sukses')}}
            </div>
            @endif
        <form action="/legal/{{$data_item->legal_id}}/update" method="POST">
                {{ csrf_field() }}
            <div class="basic-elements">
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                    <label for="legal_name">Legal Name</label>
                            <input type="text" class="form-control" name="legal_name" value="{{$data_item->legal_name}}" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="file">Sumber File</label>
                            <input type="text" value="{{$data_item->file}}" class="form-control" name="file">
                            </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update legal</button>
            </div>
        </form>
    </div>   
</div>
@endsection