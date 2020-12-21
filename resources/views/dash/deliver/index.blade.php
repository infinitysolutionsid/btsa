@extends('layouts.layout')
@section('title','Tracking Deliver System')
@section('content')
{{-- Modal tambah order --}}
<div class="modal fade" id="addorder" tabindex="-1" role="dialog" aria-labelledby="addorder" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-lg">
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
                        <div class="col-7">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Sender Name:</label>
                                        <input type="text" name="sender" placeholder="Write sender name..."
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Sender Address:</label>
                                        <input type="text" name="sender_address" placeholder="Write sender address..."
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Receiver:</label>
                                        <input type="text" name="receiver" placeholder="Write receiver name..."
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Receiver Address:</label>
                                        <input type="text" name="receiver_address"
                                            placeholder="Write receiver address..." class="form-control" required>
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
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Payload</label>
                                        <select name="payload" id="" class="form-control custom-select" required>
                                            <option value="Weight (Kg)">Weight (Kg)</option>
                                            <option value="Volume (M)">Volume (M)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Payload Value:</label>
                                        <input type="text" name="payload_value" class="form-control"
                                            placeholder="Ex: 25" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="">Isi barang / Deskripsi</label>
                                <textarea name="stuff_desc" id="" cols="30" rows="30" class="form-control"
                                    placeholder="Tulis isi barang atau deskripsi barang"></textarea>
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
<div class="row">
    <div class="col-lg-12">
        <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#statusinformation"
            aria-expanded="false" aria-controls="statusinformation">
            <span><i class="fas fa-information"></i> Click to see status explanation.</span>
        </button>
        <div class="collapse" id="statusinformation">
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="background-color: #d9edf7;">
                                        <th>Status</th>
                                        <th>Explanation.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Order Created</strong></td>
                                        <td>Order telah dibuat terlebih dahulu oleh BTSA LOGISTICS.</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Manifested</strong></td>
                                        <td>Order telah dibuat dan barang telah diterima dan diverifikasi di BTSA
                                            LOGISTICS, sudah siap dan menunggu proses pengiriman.</td>
                                    </tr>
                                    <tr>
                                        <td><strong>On Transit</strong></td>
                                        <td>Paket sedang dalam transit, dan akan diikutkan dengan jadwal
                                            pengiriman menuju kota tujuan.</td>
                                    </tr>
                                    <tr>
                                        <td><strong>On Process</strong></td>
                                        <td>Paket sedang dalam proses pengiriman, dan biasanya jika masih dalam tahap
                                            ini, untuk pembaruan update memerlukan waktu yang lama.</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Received On Destination (ROD)</strong></td>
                                        <td>Paket telah sampai pada tim BTSA LOGISTICS kota tujuan pengiriman, dan belum
                                            dikirim ke alamat tujuan.</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Delivered</strong></td>
                                        <td>Paket telah diterima di alamat tujuan.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    @if(!$trackorder->isEmpty())
                    <?php $no = 1; ?>
                    @foreach ($trackorder as $to)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$to->order_id}}</td>
                        <td><span class="badge badge-primary">{{$to->order_status}}</span></td>
                        <td>{{$to->created_at}}</td>
                        <td class="color-primary" style="text-align: right !important;">
                            @if($to->order_status == 'Order Created')
                            <a href="" data-toggle="modal" data-target="#newtrack{{$to->order_id}}"
                                class="btn btn-primary btn-rounded"><span><i class="fas fa-dolly"></i></span>
                                Create track delivery</a>
                            @elseif($to->order_status != 'Delivered')
                            <a href="" data-toggle="modal" data-target="#updatetrack{{$to->order_id}}"
                                class="btn btn-warning btn-rounded btn-md"><span><i class="fas fa-sync"></i></span>
                                Update track delivery</a>
                            <a href="#" class="btn btn-danger btn-rounded"><span><i class="fas fa-times"></i></span>
                                Cancel delivery</a>
                            @elseif($to->order_status == 'Delivered')
                            <a href="#" class="btn btn-success btn-rounded"><span><i class="fas fa-check"></i></span>
                                Track Delivered</a>
                            @endif
                            <a href="" data-target="#viewtrack{{$to->order_id}}" data-toggle="modal"
                                class="btn btn-secondary btn-rounded"><span><i class="fas fa-info-alt"></i></span></a>
                        </td>
                    </tr>


                    {{-- MODAL CREATED NEW TRACK DELIVERY --}}
                    <div class="modal fade" id="newtrack{{$to->order_id}}" tabindex="-1" role="dialog"
                        aria-labelledby="newtrack{{$to->order_id}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newtrack{{$to->order_id}}">Create Track Delivery for
                                        #{{$to->order_id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>Order Informations</h5>
                                                <p>
                                                    Pesanan dibuat pada, {{$to->created_at}}. <br>
                                                    Track ID number {{$to->order_id}} <br>
                                                    <br>
                                                    Pengirim: {{$to->sender}} <br>
                                                    Kota Pengirim: {{$to->sender_city}} <br>
                                                    Penerima: {{$to->receiver}} <br>
                                                    Kota Penerima: {{$to->receiver_city}} <br>
                                                </p>
                                                <hr>
                                                <h5>Create track delivery</h5>
                                                <form
                                                    action="/dashboard/delivery-sys/add-new-tracking/{{$to->order_id}}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Delivery Type</label>
                                                                <input type="text" name="container_type_system" id=""
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Estimated Arrival Date
                                                                    <span>*</span></label>
                                                                <input type="text" name="estimated_arrival_date"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Current Location <span>*</span></label>
                                                                <input type="text" name="current_location" id=""
                                                                    class="form-control" required>
                                                                <small class="muted-text">Better if you place it like:
                                                                    <strong>Belawan, Medan</strong> or something like:
                                                                    <strong>Belawan, Medan,
                                                                        Indonesia</strong>.</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Keterangan tambahan:</label>
                                                                <textarea name="activity" id="" cols="30" rows="10"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Create new track
                                                            delivery</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END MODAL --}}

                    {{-- MODAL UPDATE TRACK DELIVERY --}}
                    <div class="modal fade" id="updatetrack{{$to->order_id}}" tabindex="-1" role="dialog"
                        aria-labelledby="updatetrack{{$to->order_id}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updatetrack{{$to->order_id}}">Update Track Delivery for
                                        #{{$to->order_id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5>Order Informations</h5>
                                                <p>
                                                    Pesanan dibuat pada, {{$to->created_at}}. <br>
                                                    Track ID number {{$to->order_id}} <br>
                                                    <br>
                                                    Pengirim: {{$to->sender}} <br>
                                                    Kota Pengirim: {{$to->sender_city}} <br>
                                                    Penerima: {{$to->receiver}} <br>
                                                    Kota Penerima: {{$to->receiver_city}} <br>
                                                </p>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5>Updated Order Informations</h5>
                                                <p>
                                                    Status pengiriman terbaru: <strong><span
                                                            style="color:green;">{{$to->order_status}}</span></strong>
                                                    <br>
                                                    Penanggung jawab pengiriman: {{$to->updated_by}} <br>
                                                    <br>
                                                    Pesanan di-update terakhir: {{$to->updated_at}} <br>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <hr>
                                                <h5>Update track delivery</h5>
                                                <form
                                                    action="/dashboard/delivery-sys/update-transit-tracking/{{$to->order_id}}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Update delivery status</label>
                                                                <select name="order_status" id=""
                                                                    class="form-control custom-select" required>
                                                                    <option>Choose status...</option>
                                                                    <option value="On Transit">On Transit</option>
                                                                    <option value="On Process">On Process</option>
                                                                    <option value="Received On Destination">Received On
                                                                        Destination</option>
                                                                    <option value="Delivered">Delivered</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Current Location <span>*</span></label>
                                                                <input type="text" name="current_location" id=""
                                                                    class="form-control" required>
                                                                <small class="muted-text">Better if you place it like:
                                                                    <strong>Belawan, Medan</strong> or something like:
                                                                    <strong>Belawan, Medan,
                                                                        Indonesia</strong>.</small>
                                                            </div>
                                                        </div>
                                                        @if($to->order_status == 'Received On Destination')
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Last Location <span></span></label>
                                                                <input type="text" name="last_location" id=""
                                                                    class="form-control">
                                                                <small class="muted-text">Better if you place it like:
                                                                    <strong>Belawan, Medan</strong> or something like:
                                                                    <strong>Belawan, Medan,
                                                                        Indonesia</strong>.</small>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <input type="hidden" name="last_location" value="-">
                                                        @endif
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Keterangan tambahan:</label>
                                                                <textarea name="activity" id="" cols="30" rows="10"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update track
                                                            delivery</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal View Track Delivery --}}
                    <div class="modal fade" id="viewtrack{{$to->order_id}}" tabindex="-1" role="dialog"
                        aria-labelledby="viewtrack{{$to->order_id}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewtrack{{$to->order_id}}">Update Track Delivery for
                                        #{{$to->order_id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5>Order Informations</h5>
                                                <p>
                                                    Pesanan dibuat pada, {{$to->created_at}}. <br>
                                                    Track ID number {{$to->order_id}} <br>
                                                    <br>
                                                    Pengirim: {{$to->sender}} <br>
                                                    Kota Pengirim: {{$to->sender_city}} <br>
                                                    Penerima: {{$to->receiver}} <br>
                                                    Kota Penerima: {{$to->receiver_city}} <br>
                                                </p>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5>Updated Order Informations</h5>
                                                <p>
                                                    Status pengiriman terbaru: <strong><span
                                                            style="color:green;">{{$to->order_status}}</span></strong>
                                                    <br>
                                                    Penanggung jawab pengiriman: {{$to->updated_by}} <br>
                                                    <br>
                                                    Pesanan di-update terakhir: {{$to->updated_at}} <br>
                                                    <div class="my-3">
                                                        {!!QrCode::format('svg')->style('round',
                                                        0.9)->EyeColor(0,41,37,98,214,62,57)->size(100)->merge('iconbtsa.png',
                                                        .3,
                                                        true)->errorCorrection('H')->generate(URL::to('/track/qrcode/'.$to->order_id))!!}
                                                    </div>

                                                </p>
                                                <br>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END MODAL --}}
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" style="text-align:center !important;">No data founded</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('.date').datepicker({
        uiLibrary: 'bootstrap4'
    });

</script>
@endsection
