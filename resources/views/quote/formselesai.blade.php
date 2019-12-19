@extends('layouts.layout')
@section('title','Selesaikan quote request')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Selesaikan Quote Request</h4>
    </div>
    <div class="card-body">
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Successfull!</strong> {{session('sukses')}}
        </div>
        @endif
        <form action="/quote/{{$data_quote->quote_id}}/update" method="POST">
            {{ csrf_field() }}
            <div class="basic-elements">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Peminta</label>
                            <input type="text" class="form-control" name="nama_lengkap"
                                value="{{$data_quote->created_by}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Isi Quote</label>
                            <input type="text" value="{{$data_quote->quotes_name}}" class="form-control"
                                name="quotes_name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Quote Terjemahan</label>
                            <input type="text" class="form-control" value="{{$data_quote->quotes_id}}" name="quotes_id"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="link_preview">Link terbit</label>
                            <input type="text" name="link_preview" class="form-control"
                                value="{{$data_quote->link_preview}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Selesaikan</button>
                </div>
        </form>
    </div>
</div>
@endsection
