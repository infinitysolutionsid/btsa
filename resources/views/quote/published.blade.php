@extends('layouts.layout')
@section('title','Quote Published')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Quote Published</h4>
        <a href="#requestQuote">
            <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 float-right" data-toggle="modal"
                data-target="#requestQuote">
                <span class="ti-plus"></span> Request new quote
            </button>
        </a>
    </div>
    <div class="card-body">
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Successfull!</strong><br>
            <small>Terima kasih! Karena sudah submit quote baru.<br>
                <strong>Desain department</strong>
                akan menyelesaikannya dalam waktu paling lama <strong>2x24 jam</strong>.<br> Jika laporan kamu tidak
                terselesaikan hubungi
                kami
                di ext.103 atau email kami di <a
                    href="mailto:support@infinitysolutions.co.id"><strong>support@infinitysolutions.co.id</strong></a>.</small>
        </div>
        @endif
        @if (session('selesai'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Successfull!</strong><br>
            <small>{{session('selesai')}}</small>
        </div>
        @endif
        <div class="table-responsive">
            <table id="memberTables" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pembuat</th>
                        <th>Isi quote</th>
                        <th>Translate Ind</th>
                        <th>Link terbit</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($data_quote as $dt_quote)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$dt_quote->quotes_by}}</td>
                        <td>{!!$dt_quote->quotes_name!!}</td>
                        <td>{!!$dt_quote->quotes_id!!}</td>
                        <td>{{$dt_quote->link_preview}}</td>
                        <td class="text-center">
                            @if($dt_quote->status=='Selesai')
                            <span style="font-size: 1rem; color: green;"><i class="fas fa-check-circle"></i></span>
                            @elseif($dt_quote->status=='loading')
                            <span style="font-size: 1rem; color: #e18a19;"><i class="fas fa-pause-circle"></i></span>
                            @else
                            <span style="font-size: 1rem; color: red;"><i class="fas fa-times-circle"></i></span>
                            @endif
                        </td>
                        <td>
                            <form action="/quote/selesai/{{$dt_quote->quote_id}}" method="get">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-outline">
                                    Selesaikan
                                </button>
                            </form>
                            {{-- <form action="/quote/sementara/{{$dt_quote->quote_id}}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-warning btn-outline">
                                Tunda
                            </button>
                            </form> --}}
                            {{-- <form action="/quote/batal/{{$dt_quote->quote_id}}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-outline">
                                Batal
                            </button>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="requestQuote" tabindex="-1" role="dialog" aria-labelledby="requestQuote" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="/quote/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="requestQuote">Request Quote Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="basic-elements">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap"
                                                    value="{{auth()->user()->nama_lengkap}}" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label for="quotes_by">Quotes By</label>
                                                <input type="text" name="quotes_by" class="form-control" required
                                                    autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Quote:</label>
                                        <textarea name="quotes_name" id="quotes_name" class="form-control" cols="30"
                                            rows="10" autofocus></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Terjemahan Indonesia:</label>
                                        <textarea name="quotes_id" id="quotes_id" class="form-control" cols="30"
                                            rows="10" autofocus></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
