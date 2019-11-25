@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Legality Documents Managements</h4>
        <a href="#addlegal">
            <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5 float-right" data-toggle="modal" data-target="#addlegal">
            <span class="ti-plus"></span> Add Data Legal
            </button>
        </a>
    </div>
    <div class="card-body">
            @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Successfull!</strong> {{session('sukses')}}
                  </div>
                  @endif
            <div class="table-responsive">
                    <table id="legaltables" class="table table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Legal Name</th>
                                <th>Download File</th>
                                <th>Date modified at</th>
                                @if(auth()->user()->role=='administrator')
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if(!$data_item->isEmpty())
                                
                                    @php $no =1; @endphp
                                    @foreach($data_item as $dt_item)
                                    <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$dt_item->legal_name}}</td>
                                    <td><a href="{{$dt_item->file}}" target="_blank"><span class="badge badge-primary">Download this legal document</span></a></td>
                                    <td>{{$dt_item->updated_at}}</td>
                                    @if(auth()->user()->role=='administrator')
                                    <td><a href="/legal/{{$dt_item->legal_id}}/edit"><button class="btn btn-rounded btn-warning">Edit</button></a> <a href="/legal/{{$dt_item->legal_id}}/delete"><button class="btn btn-rounded btn-danger">Delete</button></a></td>
                                    @endif
                                    </tr>
                                    @endforeach
                                    @else
                                    <td colspan="7" class="text-center">No data founded!</td>
                                
                            @endif
                        </tbody>
                    </table>
                    {{$data_item->links()}}
                </div>
    </div>
</div>
<script>
    $(document).ready( function () {
    $('#legaltables').DataTable();
} );
</script>
<!-- Modal -->
<div class="modal fade" id="addlegal" tabindex="-1" role="dialog" aria-labelledby="addlegal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form action="/legal/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                        <h5 class="modal-title" id="addlegal">Add Data Legal</h5>
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
                                            <div class="form-group col-sm-6">
                                                <label for="legal_name">Nama Dokumen Legal</label>
                                                <input type="text" class="form-control" name="legal_name" autofocus>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="file">Sumber File</label>
                                            <input type="text" class="form-control" name="file">
                                            <p class="text-muted">Isikan kolom ini dengan URL file*</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data Legal</button>
                      </div>
            </form>
          </div>
        </div>
</div>
@endsection