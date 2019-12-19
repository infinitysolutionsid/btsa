@extends('layouts.layout')
@section('title','Quote Request')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Quote Request</h4>
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
        @if(session('delete'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Successfull!</strong><br>
            <small>{{session('delete')}}</small>
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
                        <th>Checked by</th>
                        @if(auth()->user()->role=='administrator')
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if(!$quote->isEmpty())

                    @php $no = 1; @endphp
                    @foreach($quote as $dt_quote)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$dt_quote->created_by}}</td>
                        <td>{{$dt_quote->quotes_name}}</td>
                        <td>{{$dt_quote->quotes_id}}</td>
                        <td>
                            @if($dt_quote->link_preview!='#')
                            <a href="{{$dt_quote->link_preview}}" target="_blank"><button class="btn btn-info btn-sm"><i
                                        class="fab fa-instagram"></i>
                                    Instagram</button></a>
                            @else
                            <button class="btn btn-dark btn-sm"><i class="fab fa-instagram"></i>
                                Not available</button>
                            @endif</td>
                        <td class="text-center">
                            @if($dt_quote->status=='Selesai')
                            <span style="font-size: 1rem; color: green;"><i class="fas fa-check-circle"></i></span>
                            @elseif($dt_quote->status=='loading')
                            <span style="font-size: 1rem; color: #e18a19;"><i class="fas fa-pause-circle"></i></span>
                            @else
                            <span style="font-size: 1rem; color: red;"><i class="fas fa-times-circle"></i></span>
                            @endif
                        </td>
                        <td>{{$dt_quote->updated_by}}</td>
                        @if(auth()->user()->role=='administrator')
                        <td>
                            <a href="/quote/{{$dt_quote->quote_id}}/delete"><button
                                    class="btn btn-rounded btn-danger"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                        @endif
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
        $('#memberTables').DataTable({
            scrollY: 300,
        });
    });

</script>
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
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_lengkap"
                                            value="{{auth()->user()->nama_lengkap}}" readonly>
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
