@extends('layouts.layout')
@section('title','Home')
@section('content')
<?php $datamember = $data_member->count();
$legalcount = $data_legal->count();
$vesselcount = $vessel->count();
?>
<div class="row">
    <div class="container-fluid">
        <div class="col-lg-12 text-left">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><span><i class="fas fa-info-circle"></i></span> Pesan Penting!</strong><br> Halo
                {{auth()->user()->nama_lengkap}}, berhubungan nya dengan terus adanya peningkatan website dan keamanan
                website, diharapkan semua pengguna Issue Report BTSA Logistics untuk melakukan <b>update data pada
                    Profile
                    pojok kanan atas</b> lalu tekan <b>Setting</b>, dan <b>isi email di kolom yang tersedia</b>. Dan
                juga isi
                data
                yang belum
                dilengkapi. Jika tidak mengerti, harap untuk menghubungi pihak IT. Terima kasih! <br><br> Salam hormat,
                <br>Bintang Tobing <br>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        {{-- <div class="col-lg-12 text-center quoterow">
            @foreach ($quote as $item)
            <a href="{{$item->link_preview}}">
        <h5><i class="fa fa-quote-left"></i> {!!$item->quotes_name!!} <i class="fa fa-quote-right"></i></h5>
        <p>- {{$item->created_by}} -</p>
        </a>
        @endforeach
        @if($quote->count()<1) <p><i>- No quotes found -</i></p>
            @endif
    </div> --}}
</div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="stat-widget-two">
                <div class="stat-content">
                    <?php $total = $irtotal->count() ?>
                    <div class="stat-text">Total IR </div>
                    <div class="stat-digit"> {{$total}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="stat-widget-two">
                <div class="stat-content">
                    <?php $totalselesai = $irtotalselesai->count() ?>
                    <div class="stat-text">Total IR Selesai </div>
                    <div class="stat-digit"> {{$totalselesai}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="stat-widget-two">
                <div class="stat-content">
                    <?php $totalbelumselesai = $irtotalbselesai->count() ?>
                    <div class="stat-text">Total IR Belum Selesai </div>
                    <div class="stat-digit"> {{$totalbelumselesai}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="stat-widget-two">
                <div class="stat-content">
                    <?php $quotecount = $quoteds->count() ?>
                    <div class="stat-text">Total Quote Terbit </div>
                    <div class="stat-digit"> {{$quotecount}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4><strong><i class="ti-ticket"></i> New Request Ticket IR</strong> @foreach($issueData->take(1) as
                    $data)&nbsp;<span><i class="fas fa-angle-double-right"></i></<span> @if($data->tujuan ==
                        'umum')Bagian Umum
                        @elseif($data->tujuan=='it')Bagian
                        IT @elseif($data->tujuan=='hrd')Bagian HRD @else @endif @endforeach</h4>
                <hr>
            </div>
            <div class="recent-comment">
                @foreach ($issueData->take(4) as $data)
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object"
                                src="file/{{$data->profilephoto}}" alt=""></a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$data->nama_lengkap}}</h4>
                        <p>{!!$data->kendala!!} </p>
                        <div class="comment-action">
                            <div class="badge badge-success">{{$data->id}}</div>
                            <div class="badge badge-warning">{{$data->approve}}</div>
                            @if($data->status=='Selesai')
                            <div class="badge badge-primary">{{$data->status}}</div>
                            @elseif($data->status=='Belum Selesai' && $data->approve=='unApproved')
                            <div class="badge badge-danger">Mohon minta untuk diapprove atasan.</div>
                            @else
                            <div class="badge badge-danger">Belum Selesai</div>
                            @endif
                        </div>
                        <p class="comment-date">{{$data->tanggal}} {{$data->jam}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /# card -->
    </div>
    {{-- <div class="col-lg-5">
        <div class="card">
            <div class="testimonial-widget-one p-17">
                <div class="testimonial-widget-one owl-carousel owl-theme">
                    @foreach ($quote->take(5) as $quoteitem)
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i> {{$quoteitem->quotes_name}} <br>Terjemahan Indonesia:
    <br>
    {{$quoteitem->quotes_id}} <i class="fa fa-quote-right"></i>
</div>
<img class="testimonial-author-img" src="{{$Member->getAvatar()}}" alt="" />
<div class="testimonial-author">{{$quoteitem->created_by}}</div>
<div class="testimonial-author-position">@if($quoteitem->status=='Selesai') Quote ini telah
    terbit - <a href="{{$quoteitem->link_preview}}" target="_blank"><i class="fab fa-instagram"></i></a>
    @endif</div>
</div>
</div>
@endforeach
@if($quote->count() < 1) <div class="item">
    <div class="testimonial-content">
        <div class="testimonial-text">
            <i class="fa fa-quote-left"></i> No quote found <i class="fa fa-quote-right"></i>
        </div>
    </div>
    </div>
    @endif
    </div>
    </div>
    </div> --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4><strong><i class="ti-ticket"></i> New Request Quote</strong></h4>
                <hr>
            </div>
            <div class="recent-comment">
                @foreach ($quotedash->take(4) as $data)
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            @inject('avatar','App\MemberModel')
                            <img class="media-object" src="file/{{$data->profilephoto}}" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$data->created_by}}</h4>
                        <p>{!!$data->quotes_name!!} </p>
                        <div class="comment-action">
                            <div class="badge badge-warning">{{$data->updated_by}}</div>
                        </div>
                        <p class="comment-date">{{$data->created_at}}</p>
                    </div>
                </div>
                @endforeach
                @if($quotedash->count()<1) <div class="media">
                    <p>No request quote data</p>
            </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    @endsection
