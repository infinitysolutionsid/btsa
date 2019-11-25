@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Jadwal Kapal Managements</h4>
        <a href="#addjadwalkapal">
            <button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5 float-right" data-toggle="modal" data-target="#addjadwalkapal">
            <span class="ti-plus"></span> Add Data Jadwal Kapal
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
                    <table id="jadwal" class="table table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Vessel</th>
                                <th>VoY</th>
                                <th>Closing Date</th>
                                <th>ETD</th>
                                <th>ETA</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @if(!$data_cat->isEmpty())
                                    @foreach($data_cat as $dt_cat)
                                    <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$dt_cat->kotaasal}}</td>
                                    <td>{{$dt_cat->kotatujuan}}</td>
                                    <td>{{$dt_cat->vessel}}</td>
                                    <td>{{$dt_cat->voy}}</td>
                                    <td>{{$dt_cat->closingdate}}</td>
                                    <td>{{$dt_cat->etd}}</td>
                                    <td>{{$dt_cat->eta}}</td>
                                    <td><a href="/jadwal/{{$dt_cat->id}}/edit"><button class="btn btn-rounded btn-warning">Edit</button></a> <a href="/jadwal/{{$dt_cat->id}}/delete"><button class="btn btn-rounded btn-danger">Delete</button></a></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <td colspan="9" class="text-center">No data founded!</td>
                                
                            @endif
                        </tbody>
                    </table>
                    
                </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addjadwalkapal" tabindex="-1" role="dialog" aria-labelledby="addjadwalkapal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form action="/jadwal/addnew" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                        <h5 class="modal-title" id="addjadwalkapal">Add Data Jadwal Kapal</h5>
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
                                                    <input type="text" class="form-control" name="kotaasal" autofocus>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">Kota Tujuan</label>
                                        <input type="text" class="form-control" name="kotatujuan" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="vessel">Vessel</label>
                                            <select name="vessel" id="vessel" class="form-control">
                                                <option value="#" disabled selected>Select Vessel</option>
                                                @if(!$vessel->isEmpty())
                                                @foreach ($vessel as $vesselitem)
                                            <option value="{{$vesselitem->vessel}}">{{$vesselitem->vessel}}</option>
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
                                                    <input type="text" class="form-control" name="voy" autofocus>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="closingdate">Closing Date</label>
                                        <input type="text" class="form-control" name="closingdate" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="etd">ETD</label>
                                                    <input type="text" class="form-control" name="etd" autofocus>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eta">ETA</label>
                                        <input type="text" class="form-control" name="eta" value="">
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
</div>
<script>
        $(document).ready( function () {
        $('#jadwal').DataTable();
    } );
    </script>
@endsection