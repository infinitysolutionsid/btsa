@extends('layouts.layout')
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
{{-- <div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="testimonial-widget-one p-17">
                <div class="testimonial-widget-one owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                minim veniam, quis
                                nostrud exercitation <i class="fa fa-quote-right"></i>
                            </div>
                            <img class="testimonial-author-img" src="{{asset('file/default.jpg')}}" alt="" />
<div class="testimonial-author">TYRION LANNISTER</div>
<div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> --}}
@endsection
