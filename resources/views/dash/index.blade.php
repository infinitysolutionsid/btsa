@extends('layouts.layout')
@inject('IRModel', '\App\IRModel')
@section('title','Home')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <?php $datamember = $data_member->count() ?>
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-user color-success border-success"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Member Terdaftar</div>
                    <div class="stat-digit">{{$datamember}} pengguna</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <?php $legalcount = $data_legal->count() ?>
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-bookmark-alt color-primary border-primary"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Dokumen Terupload</div>
                    <div class="stat-digit">{{$legalcount}} dokumen</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <?php $vesselcount = $vessel->count() ?>
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-layout-menu-v color-danger border-danger"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Vessel Terdaftar</div>
                    <div class="stat-digit">{{$vesselcount}} vessel</div>
                </div>
            </div>
        </div>
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
                    <?php $totalbatal = $irtotalbatal->count() ?>
                    <div class="stat-text">Total IR Batal </div>
                    <div class="stat-digit"> {{$totalbatal}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-title">
                <h4><strong><i class="ti-ticket"></i> New Request Ticket IR</strong></h4>
                <hr>
            </div>
            <div class="recent-comment">
                @foreach ($issueData->take(3) as $data)
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="{{$IRModel->getAvatar()}}" alt="..."></a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$data->nama_lengkap}}</h4>
                        <p>{{$data->kendala}} </p>
                        <div class="comment-action">
                            <div class="badge badge-success">{{$data->id}}</div>
                            {{-- <span class="m-l-10">
                                <a href="#"><i class="ti-check color-success"></i></a>
                                <a href="#"><i class="ti-close color-danger"></i></a>
                                <a href="#"><i class="fa fa-reply color-primary"></i></a>
                            </span> --}}
                        </div>
                        <p class="comment-date">{{$data->tanggal}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /# card -->
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="testimonial-widget-one p-17">
                <div class="testimonial-widget-one owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur
                                adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                ad
                                minim veniam, quis
                                nostrud exercitation <i class="fa fa-quote-right"></i>
                            </div>
                            <img class="testimonial-author-img" src="{{$IRModel->getAvatar()}}" alt="" />
                            <div class="testimonial-author">TYRION LANNISTER</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur
                                adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                ad
                                minim veniam, quis
                                nostrud exercitation <i class="fa fa-quote-right"></i>
                            </div>
                            <img class="testimonial-author-img" src="{{$IRModel->getAvatar()}}" alt="" />
                            <div class="testimonial-author">TYRION LANNISTER</div>
                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
