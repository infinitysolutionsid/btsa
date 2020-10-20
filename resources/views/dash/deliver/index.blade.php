@extends('layouts.layout')
@section('title','Tracking Deliver System')
@section('content')
{{-- Modal tambah order --}}
<div class="modal fade" id="addorder" tabindex="-1" role="dialog" aria-labelledby="addorder" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add new order track</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('add.order')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <?php $btsa = 'BTSA';
                            $year = Date('Y');
                            $randomid = mt_rand(1000, 9999);
                            $month = Date('md');
                            $compact = $btsa . $year . $randomid . $month; $justNumber= $year.$randomid.$month; ?>
                    <input type="hidden" name="id" value="{{$justNumber}}">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Order ID <span><sup>*Auto-generated</sup></span></label>
                                <input type="text" name="order_id" value="{{$compact}}" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Sender:</label>
                                <input type="text" name="sender" placeholder="Write sender name..." class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Receiver:</label>
                                <input type="text" name="receiver" placeholder="Write receiver name..."
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="Sender City:">Sender City:</label>
                                <select name="sender_city" id="sender_city" class="
                                form-control custom-select" required>
                                    <option>Choose city...</option>
                                    <option value="Medan">Medan</option>
                                    <option value="Pekanbaru">Pekanbaru</option>
                                    <option value="Palembang">Palembang</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Semarang">Semarang</option>
                                    <option value="Surabaya">Surabaya</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Lombok">Lombok</option>
                                    <option value="Makassar">Makassar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Receiver City:</label>
                                <input type="text" name="receiver_city" id="" class="form-control"
                                    placeholder="Write the receiver city..." required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<section>
    <div class="container">
        @if(session('selamat'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>Well done!</strong> {{session('selamat')}}
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<div class="card">
    <div class="card-title">
        <h4>Tracking Deliver System</h4>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addorder">
            <span><i class="fas fa-plus"></i></span> Add Order
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($trackorder as $to)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$to->order_id}}</td>
                        @foreach ($to->reports as $item)
                        <td><span class="badge badge-primary">{{$item->status}}</span></td>
                        @endforeach
                        <td>{{$to->created_at}}</td>
                        <td class="color-primary">
                            <a href="#" class="btn btn-primary btn-rounded"><span><i class="fas fa-dolly"></i></span>
                                Create track delivery</a>
                            <a href="#" class="btn btn-warning btn-rounded btn-md"><span><i
                                        class="fas fa-sync"></i></span>
                                Update track delivery</a>
                            <a href="#" class="btn btn-danger btn-rounded"><span><i class="fas fa-times"></i></span>
                                Delete track delivery</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
