<!--AppDelegate-->
<!--STARPROJECTX-->
<!--Created by Bintang Cato Jeremia Tobing on 23/04/19.-->
<!--Copyright © 2019 Bintang Cato Jeremia Tobing. All rights reserved.-->
@inject('Member','\App\MemberModel')
<!DOCTYPE html>
<html lang="id" id="home">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>BTSA LOGISTICS PPJK | EMKL | EMKU</title>
    <link rel="shortcut icon"
        href="https://res.cloudinary.com/btsa-co-id/image/upload/v1541503574/jscsstxtfiledll/icon/starlogo.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="BTSA Logistics adalah Expedisi, EMKL, EMKU & Custom Clearance dan juga termasuk daftar perusahaan custom clearance di Indonesia. Berada di Jakarta, Medan, Surabaya, Semarang, Palembang, Pekan Baru, Bali,  Makasar dan Lombok.">
    <meta name="keywords"
        content="PPJK, EMKL, Expedisi, Export-Import, Custom Clearance, BTSA, BTSA LOGISTICS, Bea Cukai Indonesia, Jasa Ekspedisi, Custom Clearance Indonesia, PPJK Indonesia, Daftar perusahaan Bea Cukai di Indonesia">
    <meta name="author" content="Bintang Cato Jeremia L Tobing">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link expr:href='data:blog.url' hreflang='x-default' rel='alternate' />
    <meta content='Indonesia' name='geo.placename' />
    <meta content='id' name='geo.country' />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae026c985d.js" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://res.cloudinary.com/btsa-co-id/raw/upload/v1594267701/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129070772-1"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://res.cloudinary.com/btsa-co-id/raw/upload/v1541504267/jscsstxtfiledll/js/jquery-3.1.1.min.js">
    </script>
    <script src="https://res.cloudinary.com/btsa-co-id/raw/upload/v1541554459/jscsstxtfiledll/js/script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {{-- facebook open graphs --}}
    <meta property="fb:admins" content="1282698325202260">
    <meta property="og:site_name" content="BTSA LOGISTICS PPJK | EMKL | EMKU" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('metadesc')" />
    <meta property="og:image"
        content="{!!url('https://res.cloudinary.com/btsa-co-id/image/upload/v1585810115/popupimg/ogimage.jpg')!!}">
</head>

<body id="mypage" data-spy="scroll" data-target=".navbar" data-offset="90">

    <!-- Auto PopUp -->
    <div class="modal fade" id="global-modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body" style="padding:0; background-color:#fff;">
                    <img class="img-full img-responsive"
                        src="https://res.cloudinary.com/btsa-co-id/image/upload/v1594267344/optimized/Peta_BTSA_28Feb2020.jpg"
                        style="height:100%; width:100%;">
                </div>
            </div>
        </div>
    </div>
    <!-- End Auto PopUp -->
    <!-- Modal -->
    <div id="companyprofile" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content" style="background-color: #fff; padding-bottom:15px;">
                <div class="modal-body">
                    <div class="col-md text-center">
                        <h5>Choose our company profile</h5>
                        <a
                            href="https://res.cloudinary.com/blogbtsa/image/upload/v1595220647/CompanyProfile/Company_Profile_BTSA_2020_IND.pdf"><button
                                class="btn btn-primary btn-md" type="button" aria-haspopup="true"
                                aria-expanded="false">Bahasa Indonesia</button></a>
                        <a
                            href="https://res.cloudinary.com/blogbtsa/image/upload/v1595220647/CompanyProfile/Company_Profile_BTSA_2020_ENG.pdf"><button
                                class="btn btn-primary btn-md" type="button" aria-haspopup="true"
                                aria-expanded="false">Bahasa Inggris</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background-color: #e92b2f;"></span>
                    <span class="icon-bar" style="background-color: #e92b2f;"></span>
                    <span class="icon-bar" style="background-color: #e92b2f;"></span>
                </button>
                <a href="#home" class="navbar-brand">
                    <img src="https://res.cloudinary.com/btsa-co-id/image/upload/v1594267343/optimized/brand.png"
                        alt="brand" style="float:none !important">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Tentang Kami <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#aboutus">SIAPA KAMI?</a></li>
                            <li><a href="#visimisi">VISI & MISI</a></li>
                            <li><a href="#values">NILAI KAMI</a></li>
                            <li><a href="#services">JASA KAMI</a></li>
                            <li><a href="#why">MENGAPA KAMI?</a></li>
                            <li><a href="#contact">KANTOR KAMI</a></li>
                        </ul>
                    </li>
                    <li><a href="https://btsa.co.id/news">News</a></li>
                    <li><a href="https://btsa.co.id/gallery.html" target="_blank">Galeri</a></li>
                    <li><a href="/candidate" target="_blank">Karir</a></li>
                    @if(auth()->check())
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true"><span><img class="media-object"
                                    src="{{asset('file/'.auth()->user()->profilephoto)}}"></span>
                            {{auth()->user()->nama_lengkap}}</a>
                        <ul class="dropdown-menu">
                            <li><a href="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                            <li><a href="/logout"><i class="fas fa-times"></i> Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="login"><a href="#" id="myBtnLogin" style="color:#fff !important"><span
                                class="glyphicon glyphicon-user"></span> LOGIN</a></li>
                    <div class="modal fade" id="myModalLogin" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background-color:#fff;">
                                <div class="modal-header" style="color:#fff; background-color:#282662;">
                                    <h4 class="modal-title text-center">- CHOOSE YOUR LOGIN PAGE -</h4>
                                </div>
                                <div class="modal-body text-center row">
                                    <div class="col-sm-6" style="margin-bottom:10px;">
                                        <a href="/queue"><button type="button" class="btn btn-danger"
                                                style="width:270px; height:60px;">BTSA Issue
                                                Report<br>
                                                <font class="personalonly"><i>-For Company Only-</i></font>
                                            </button></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="https://btsa.co.id/comingsoon.html" target="_blank"><button
                                                type="button" class="btn btn-custom"
                                                style="width:270px; height:60px;">Data Customer</button></a><br><br>
                                    </div>
                                    <div class="col-sm-6" style="margin-bottom:10px;">
                                        <a href="https://trello.com/login?returnUrl=%2Fb%2FzCkoX57j"
                                            target="_blank"><button type="button" class="btn btn-danger"
                                                style="width:270px; height:60px;">Dokumen Surat<br>
                                                <font class="personalonly"><i>-For Company Only-</i></font>
                                            </button></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="/restricted"><button type="button" class="btn btn-custom"
                                                style="width:270px; height:60px;">BTSA Restricted
                                                Area<br>
                                                <font class="personalonly"><i>-For Company Only-</i></font>
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <div class="headertop">
        <div class="row text-center">
            <div class="col-sm-12 text-center">
                <!-- <h1 class="slide"><strong>BTSA LOGISTICS</strong></h1>
        <h3 class="slideanim">DOMESTIC | EXPORT | IMPORT | TRUCKING</h3>
        <h3 class="slideanim">BY SEA | BY LAND | BY AIR</h3>-->
                <img src="https://res.cloudinary.com/btsa-co-id/image/upload/v1594267344/optimized/logobtsa.png"
                    class="responsive text-center" alt=""><br>
                <a href="#"><button class="btn btn-default btn-md dropdown-toggle" type="button" aria-haspopup="true"
                        aria-expanded="false" data-toggle="modal" data-target="#companyprofile">Our Company Profile
                        <span class="caret"></span></button>
                </a>
                <a href="https://btsa.co.id/news/id/"><button class="btn btn-default btn-md" type="button"
                        aria-haspopup="true" aria-expanded="false">Our Blog</button></a>
            </div>
        </div>
    </div>

    <!-- Section About Us -->
    <section class="aboutus" id="aboutus">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2><strong>SIAPA KAMI?</strong></h2>
                    <hr style="width: 100px; height: 3px; border:0; background-color: #282662">
                    <h4 class="slideanim">Kami adalah perusahaan<br>BTSA LOGISTICS</h4>
                    <p class="slideanim">Didirikan pada tahun 2000, BTSA Logistics telah menjadi salah satu perusahaan
                        jasa ekspedisi
                        di Indonesia.<br>Saat ini kami terdiri dari 4 departemen : <i>Domestic, Export, Import</i> dan
                        <i>Trucking</i>.
                        <br><strong>BTSA Logistics</strong> tergabung dalam <strong>PT. Berlian Tangguh
                            Sejahtera</strong> untuk legalitas departemen
                        <i>Domestic</i><br> dan <strong>PT. Berlian Transtar Abadi</strong> untuk legalitas departemen
                        <i>Export, Import</i> dan
                        <i>Trucking</i>.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section About Us -->

    <!-- Section Visi & Misi -->
    <section class="visimisi" id="visimisi">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2>VISI KAMI</h2>
                    <hr style="width: 70px; height: 3px; border:0; background-color: #fff">
                    <h4 class="slideanim">Menjadi perusahaan ekspedisi terpercaya di Indonesia.</h4>
                </div>
            </div><br><br>
            <div class="col-sm-12">
                <h2 class="slide">MISI KAMI</h2>
                <hr style="width: 70px; height: 3px; border:0; background-color: #fff">
                <p class="col-sm-12 slideanim">1. Mempersiapkan SDM yang berkompeten di bidangnya serta berintegritas
                    tinggi.<br>
                    2. Memberikan pelayanan prima seperti kecepatan, keamanan dan keselamatan pengiriman barang.<br>
                    3. Senantiasa menyampaikan informasi serta solusi kreatif untuk memecahkan masalah pelanggan.<br>
                    4. Berupaya menghasilkan / menciptakan efisiensi dan efektifitas bersama pelanggan dan mitra usaha
                    dalam proses bisnis.<br>
                    5. Memperluas jaringan bisnis dan kemitraan sesuai kebutuhan pasar.</p>
            </div>
        </div>
    </section>

    <!-- Section Nilai -->
    <section class="values" id="values">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2><strong>BUDAYA PERUSAHAAN</strong></h2>
                    <hr style="width: 100px; height: 3px; border:0; background-color: #282662">
                </div>
            </div><br>
            <div class="row slideanim">
                <div class="col-sm-4">
                    <span style="color: #282662; font-size: 4rem;" alt="budaya perusahaan BTSA Logistics"><i
                            class="fab fa-sketch"></i></span>
                    <h4 style="color: #212121;"><strong>Integrity</strong></h4>
                    <p>Memiliki sikap kejujuran, terbuka, bertanggung jawab dan dapat dipercaya dalam melayani pelanggan
                        internal dan eksternal.</p>
                </div>
                <div class="col-sm-4">
                    <span style="color: #282662; font-size: 4rem;" alt=""><i class="fas fa-crown"></i></span>
                    <h4 style="color: #212121;"><strong>Loyality</strong></h4>
                    <p>Loyal dan setia terhadap perusahaan, karyawan dan pelanggan utama.</p>
                </div>
                <div class="col-sm-4">
                    <span style="color: #282662; font-size: 4rem;" alt=""><i class="fas fa-eye"></i></span>
                    <h4 style="color: #212121;"><strong>Visioner</strong></h4>
                    <p>Memiliki pandangan atau visi kedepan serta mampu membuat rencana untuk mewujudkannya.</p>
                </div>
            </div><br>
            <div class="row slideanim">
                <div class="col-sm-3">
                    <span style="color: #282662; font-size: 4rem;" alt=""><i class="fab fa-algolia"></i></span>
                    <h4 style="color: #212121;"><strong>Be Proactive</strong></h4>
                    <p>Tanggap dan inisiatif dalam menghadapi situasi internal dan eksternal untuk mencapai hal-hal yang
                        lebih baik bagi perusahaan, karyawan dan pelanggan.</p>
                </div>
                <div class="col-sm-3">
                    <span style="color: #282662; font-size: 4rem;" alt=""><i class="fas fa-users"></i></span>
                    <h4 style="color: #212121;"><strong>Team Work</strong></h4>
                    <p>Saling bekerja sama, menghormati, menghargai sesama rekan kerja dan pelanggan untuk mencapai
                        tujuan dan visi perusahaan.</p>
                </div>
                <div class="col-sm-3">
                    <span style="color: #282662; font-size: 4rem;" alt=""><i class="far fa-handshake"></i></span>
                    <h4 style="color: #212121;"><strong>Service</strong></h4>
                    <p>Memberikan pelayanan prima kepada pelanggan internal dan eksternal perusahaan</p>
                </div>
                <div class="col-sm-3">
                    <span style="color: #282662; font-size: 4rem;" alt=""><i class="fas fa-star"></i></span>
                    <h4 style="color: #212121;"><strong>Awareness</strong></h4>
                    <p>Menyadari dan selalu bertindak positif serta bertanggung jawab untuk membuat lingkungan internal
                        dan eksternal menjadi lebih baik.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Nilai -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-7105573463810993",
            enable_page_level_ads: true
        });

    </script>
    <!-- Section Services -->
    <section class="services" id=services>
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class=""><strong>JASA KAMI</strong></h2>
                    <h4>Inilah jasa yang kami tawarkan</h4>
                    <hr style="width: 100px; height: 3px; border:0; background-color: #fff">
                </div>
            </div><br>
            <div class="row slideanim">
                <div class="col-sm-3">
                    <span style="font-size:3rem;"><i class="fas fa-globe-asia"></i></span>
                    <h4><strong>DOMESTIC</strong></h4>
                    <p>Kami menyediakan jasa pengiriman via laut ke seluruh wilayah di Indonesia meliputi :<br>
                        <p>1. EMKL (Ekspedisi Muatan Kapal Laut)<br>
                            2. Breakbulk <br>
                            3. Pengiriman alat berat <br>
                            4. Barang Pindahan <br>
                            5. Pengiriman Mobil <br>
                        </p>
                    </p>
                </div>
                <div class="col-sm-3">
                    <span style="font-size:3rem;"><i class="fas fa-expand-arrows-alt"></i></span>
                    <h4><strong>EXPORT</strong></h4>
                    <p>Kami hadir di pelabuhan / bandara :<br>
                        <p>
                            1. Tanjung Priuk, Jakarta<br>
                            2. Belawan, Sumatera Utara<br>
                            3. Kualanamu, Sumatera Utara<br>
                            4. Soekarno Hatta, Jakarta<br>
                            5. Pelabuhan Tanjung Perak, Surabaya<br>
                            6. bandara Juanda, Surabaya<br>
                            7. Pelabuhan Soekarno Hatta, Makassar<br>
                            8. Pelabuhan Boom Baru, Palembang<br>
                            9. Bandara Sultan Mahmud Badaruddin II, Palembang<br>
                        </p>
                    </p>
                </div>
                <div class="col-sm-3">
                    <span style="font-size:3rem;"><i class="fas fa-file-import"></i></span>
                    <h4><strong>IMPORT</strong></h4>
                    <p>Kami hadir di pelabuhan / bandara :<br>
                        <p>
                            1. Tanjung Priuk, Jakarta<br>
                            2. Belawan, Sumatera Utara<br>
                            3. Kualanamu, Sumatera Utara<br>
                            4. Soekarno Hatta, Jakarta<br>
                            5. Pelabuhan Tanjung Perak, Surabaya<br>
                            6. bandara Juanda, Surabaya<br>
                            7. Pelabuhan Soekarno Hatta, Makassar<br>
                            8. Pelabuhan Boom Baru, Palembang<br>
                            9. Bandara Sultan Mahmud Badaruddin II, Palembang<br>
                        </p>
                    </p>
                </div>
                <div class="col-sm-3">
                    <span style="font-size:3rem;"><i class="fas fa-truck-loading"></i></span>
                    <h4><strong>TRUCKING</strong></h4>
                    <p>Kami menyediakan jasa trucking yang meliputi :
                        <p>
                            1. Trailer<br>
                            2. Dump Truck<br>
                            3. Lost bak<br>
                            4. Mobil Box roda 4/6<br>
                        </p>
                    </p>
                </div>
            </div><br><br>
            <div class="row slideanim">
                <div class="col-sm-3">
                    <span style="font-size:3rem;"><i class="fas fa-plane-departure"></i></span>
                    <h4><strong>PENGIRIMAN VIA UDARA</strong></h4>
                    <p>Kami menyediakan jasa pengiriman via udara meliputi :<br>
                        <p>
                            1. Door to door service<br>
                            2. Airport to airport service<br>
                            3. Custom Clearance in Airport<br>
                        </p>
                    </p>
                </div>
                <div class="col-sm-3">
                    <span style="font-size:3rem;"><i class="fas fa-dolly-flatbed"></i></span>
                    <h4><strong>PROYEK KARGO</strong></h4>
                    <p>Kami menyediakan jasa proyek kargo :<br>
                        <p>
                            1. Custom Clearance<br>
                            2. Heavy Equipment<br>
                            3. Moving over size cargo<br>
                            4. Carter LCT<br>
                            5. Carter Shipment.
                        </p>
                    </p>
                </div>
                <div class="col-sm-3">
                    <span style="font-size:3rem;"><i class="fas fa-warehouse"></i></span>
                    <h4><strong>WAREHOUSE HANDLING</strong></h4>
                    <p>Kami hadir di Medan & Palembang
                    </p>
                </div>
                <div class="col-sm-3">
                    <span style="font-size:3rem;"><i class="fas fa-people-carry"></i></span>
                    <h4><strong>DISTRIBUTION HANDLING</strong></h4>
                    <p>Kami hadir di seluruh pulau Sumatera

                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Services -->

    <!-- Section Why choose us -->
    <section class="why" id="why">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2><strong>MENGAPA MEMILIH KAMI?</strong></h2>
                    <hr style="width: 100px; height: 3px; border:0; background-color: #282662">
                </div>
            </div><br><br>
            <div class="row slideanim">
                <div class="col-sm-6">
                    <span style="font-size:5rem; color: #282662;"><i class="fab fa-black-tie"></i></span>
                    <h4 style="color: #282662;"><strong>SUDAH BERPENGALAMAN</strong></h4>
                    <p>Sudah berpengalaman sejak tahun 2000<br>BTSA LOGISTICS telah hadir dan memiliki pengalaman selama
                        lebih dari 18 Tahun.</p>
                </div>
                <div class="col-sm-6">
                    <span style="font-size:5rem; color: #282662;"><i class="fas fa-clock"></i></span>
                    <h4 style="color: #282662;"><strong>RESPON YANG CEPAT</strong></h4>
                    <p>Kami memiliki tim khusus untuk merespon segala keperluan Anda.</p>
                </div>
            </div><br><br>
            <div class="row slideanim">
                <div class="col-sm-6">
                    <span style="font-size:5rem; color: #282662;"><i class="fas fa-users"></i></span>
                    <h4 style="color: #282662;"><strong>TEAM</strong></h4>
                    <p>Kami memiliki tim yang responsif, berkompetensi, berintegritas,<br>berorientasi terhadap layanan
                        dan kerja sama tim.</p>
                </div>
                <div class="col-sm-6">
                    <span style="font-size:5rem; color: #282662;"><i class="fas fa-network-wired"></i></span>
                    <h4 style="color: #282662;"><strong>JARINGAN</strong></h4>
                    <p>Kami memiliki jaringan yang sangat luas dan<br> menguasai pengiriman Antar Pulau,<br>
                        Export/Import via laut dan udara,<br>Trucking mobil kecil hingga besar,<br>
                        Jasa fumigasi standart Barantan dan Jasa Pest Control.</p>
                </div>
            </div><br><br>
            <div class="row slideanim">
                <div class="col-sm-6">
                    <span style="font-size:5rem; color: #282662;"><i class="fas fa-chart-line"></i></span>
                    <h4 style="color: #282662;"><strong>PERKEMBANGAN</strong></h4>
                    <p>Kami selalu berkembang untuk memberikan kenyamanan untuk Anda.</p>
                </div>
                <div class="col-sm-6">
                    <span class="glyphicon glyphicon-time logo-why" style="color: #282662;"></span>
                    <h4 style="color: #282662;"><strong>ON TIME</strong></h4>
                    <p>Kami selalu bekerja dengan target dan itu yang membuat kami selalu On Time dalam mengerjakan
                        sesuatu.</p>
                </div>
            </div><br><br>
            <div class="row slideanim">
                <div class="col-sm-12">
                    <span class="glyphicon glyphicon-copy logo-why" style="color: #282662;"></span>
                    <h4 style="color: #282662;"><strong>KONTRAK</strong></h4>
                    <p>Kami selalu memberikan kontrak kerja yang jelas, profesional dan transparan.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Why choose us -->

    <!-- Section Partner -->
    <section class="partnerplp" id="partnerplp">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2><strong>PARTNER OF</strong></h2>
                    <hr style="width: 100px; height: 3px; border:0; background-color:#fff;">
                </div><br>
                <div class="row">
                    <div class="col-sm-6 slideanim">
                        <img src="https://res.cloudinary.com/btsa-co-id/image/upload/v1541504860/jscsstxtfiledll/img/plp.png"
                            height="150px" width="150px;">
                        <h4 class="slideanim"><strong><a href="http://plpestindo.co.id"
                                    style="text-decoration:none; color:#fff;" target="_blank">PT.PANCA LESTARI
                                    PESTINDO</a></strong></h4>
                        <p class="slideanim"><strong>PT. Panca Lestari Pestindo</strong> adalah perusahaan yang bergerak
                            di bidang jasa Fumigasi dan Pengendalian Hama (Pest Control).
                            <br>Berdiri pada Maret 2016, dan telah memiliki tenaga kompeten yang telah mengikuti
                            pelatihan di Bekasi tepatnya <br>di Balai Uji Terap Teknik Dan Metode Karantina Pertanian
                            (BUTTMKP) yang bersertifikat
                            <br>dari Standar Badan Karantina
                            Pertanian (Barantan) baik Manajemen Mutu maupun Teknis.</p>
                    </div>
                    <div class="col-sm-6 slideanim">
                        <img src="https://res.cloudinary.com/btsa-co-id/image/upload/v1594267344/optimized/IS.png"
                            height="150px" width="150px;">
                        <h4 class="slideanim"><strong><a href="https://infinitysolutions.co.id"
                                    style="text-decoration:none; color:#fff;" target="_blank">PT.BENUA SOLUSI
                                    TEKNOLOGI</a></strong></h4>
                        <p class="slideanim"><strong>PT. Benua Solusi Teknologi</strong> adalah perusahaan dibidang
                            teknologi informasi yang muncul di Indonesia.
                            <br>Berdiri pada Januari 2019, dan kami terus berkomitmen untuk meningkatkan kecerdasan dan
                            keahlian kami <br>dengan demikian kami bisa mencapai kesuksesan kami melalui
                            <br>pencapaian kinerja dan kualitas yang tinggi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Partner -->

    <!-- Section Gallery -->
    <section class="gallery" id="gallery">

    </section>
    <!-- End Section Gallery -->

    <!-- Contact -->
    <section class="contact" id="contact">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2><strong>KANTOR KAMI</strong></h2>
                    <hr style="width: 100px; height: 3px; border:0; background-color: #fff">
                </div>
                <div class="col-sm-4 text-left">
                    <h4><strong>PT.BERLIAN TANGGUH SEJAHTERA</strong></h4>
                    <p>Jalan Williem Iskandar Komp. MMTC B 84-85<br>Medan Estate, Deli Serdang Medan 20371
                        <br><span class="glyphicon glyph icon-phone-alt"></span><a href="tel:06180032999"
                            style="text-decoration:none; color:#fff"> (061) 8003 2999</a> | Fax. (061) 8003 2996<br>
                        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:market@btsa.co.id"
                            style="text-decoration:none; color:#fff"> market@btsa.co.id</a><br>
                        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:market@btsa.co.id"
                            style="text-decoration:none; color:#fff"> sales_ap@btsa.co.id</a></p><br>
                    <h4><strong>PT.SUMBER TRANSTAR ABADI</strong></h4>
                    <p>Jalan Veteran No.173C Kec.Ilir Timur I,<br>Kel. Kepandean Baru - Palembang 31025
                        <br><span class="glyphicon glyph icon-phone-alt"></span><a href="tel:0711354811"
                            style="text-decoration:none; color:#fff">(0711) 354811</a> | Fax. (0711) 358880 <br>
                        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:welly@stalogistics.co.id"
                            style="text-decoration:none; color:#fff"> welly@stalogistics.co.id</a><br>
                        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:wel_gun8@yahoo.com"
                            style="text-decoration:none; color:#fff"> wel_gun8@yahoo.com</a></p><br>
                    <h4><strong>HUBUNGI KAMI</strong></h4>
                    <p>Kamu dapat mengirim pesan lewat <a href="mailto:market@btsa.co.id" style="color:#fff">email
                            kami</a> untuk mendapatkan penawaran yang terbaik.</p>
                    <ul style="padding-left:0; margin-left:0;">
                        <li><a href="https://www.facebook.com/BTSALogistics/" data-toggle="tooltip" target="_blank"
                                class="myTooltip" data-placement="bottom" title="Add Me!">
                                <i class="fab fa-facebook fa-2x" title="Add us on Facebook" style="color: #fff"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/btsalogistics" data-toggle="tooltip" target="_blank"
                                class="myTooltip" data-placement="bottom" title="Follow Me">
                                <i class="fab fa-instagram fa-2x" title="Add us on Instagram"
                                    style="color: #fff"></i></a></li>
                        <li><a href="https://maps.google.com/maps?cid=14920346747173850009" data-toggle="tooltip"
                                target="_blank" class="myTooltip" data-placement="bottom" title="Locate us on Maps">
                                <i class="fas fa-map-marked-alt fa-2x" title="Add us on Facebook"
                                    style="color: #fff"></i></a></li>
                        <li><a href="https://local.google.com/place?id=14920346747173850009&use=srp#fpstate=lie"
                                data-toggle="tooltip" target="_blank" class="myTooltip" data-placement="bottom"
                                title="Search us on Google">
                                <i class="fab fa-google fa-2x" title="Add us on Facebook" style="color: #fff"></i></a>
                        </li>
                        <li><a href="https://id.wikipedia.org/wiki/Pengguna:Btsalogistics" data-toggle="tooltip"
                                target="_blank" class="myTooltip" data-placement="bottom"
                                title="Learn about us on Wiki">
                                <i class="fab fa-wikipedia-w fa-2x" title="Add us on Facebook"
                                    style="color: #fff"></i></a></li>
                        <li><a href="http://www.youtube.com/c/BTSALogisticsYourReliableLogisticsPartner"
                                data-toggle="tooltip" target="_blank" class="myTooltip" data-placement="bottom"
                                title="Watch us on Youtube">
                                <i class="fab fa-youtube fa-2x" title="Add us on Facebook" style="color: #fff"></i></a>
                        </li>
                    </ul>

                </div>
                <div class="col-sm-4 text-left">
                    <h4><strong>PT.BERLIAN TRANSTAR ABADI</strong></h4>
                    <p><strong>Medan</strong><br>Jalan Williem Iskandar Komp. MMTC C 93-94<br>Medan Estate, Deli Serdang
                        Medan 20371
                        <br><span class="glyphicon glyphicon-phone-alt"></span><a href="tel:06180033461"
                            style="text-decoration:none; color:#fff"> (061) 8003 3461</a> | Fax. (061) 8003 2996<br>
                        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:market@btsa.co.id"
                            style="text-decoration:none; color:#fff"> market@btsa.co.id</a></p><br>
                    <p><strong>Jakarta</strong><br>Ruko Gading Bukit Indah Blok SB No.25<br>Jl. Raya Gading Kirana,
                        RT.18/RW.8<br>Kelapa Gading Barat, Jakarta Utara 14240
                        <br><span class="glyphicon glyphicon-phone-alt"></span><a href="tel:02145854261"
                            style="text-decoration:none; color:#ffffff"> (021) 4585 4261</a><br>
                        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:market@btsa.co.id"
                            style="text-decoration:none; color:#fff"> market@btsa.co.id</a></p><br>
                    <p><strong>Surabaya</strong><br>Jl. Kalimas Baru Blok A-8 No.29, Perak Utara, Kec. Pabean
                        Cantian<br>Kota SBY, Jawa Timur 60165<br>
                        <span class="glyphicon glyphicon-phone-alt"></span><a href="tel:02145854261"
                            style="text-decoration:none; color:#ffffff"> (021) 4585 4261</a><br>
                        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:market@btsa.co.id"
                            style="text-decoration:none; color:#fff"> market@btsa.co.id</a></p><br>
                    <p><strong>Makassar</strong><br>Jalan gunung latimojong<br>Ruko latimojong indah blok A - 28<br>
                        <span class="glyphicon glyphicon-phone-alt"></span><a href="tel:04113633366"
                            style="text-decoration:none; color:#fff"> (0411) 363 3366</a><br>
                        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:market@btsa.co.id"
                            style="text-decoration:none; color:#fff"> market@btsa.co.id</a></p>
                </div>
                <div class="col-sm-4 text-left">
                    <h4><strong>PT.PANCA LESTARI PESTINDO</strong></h4>
                    <p>Jalan Williem Iskandar Komp. MMTC C 93-94<br>Medan Estate, Deli Serdang Medan 20371
                        <br><span class="glyphicon glyphicon-phone-alt"></span><a href="tel:06180033461"
                            style="text-decoration:none; color:#fff"> (061) 8003 3461</a><br>
                        <span class="glyphicon glyphicon-phone-alt"></span> (+62) 812 6214 2299
                        <br><span class="glyphicon glyphicon-envelope"></span><a href="mailto:market@plpestindo.co.id"
                            style="text-decoration:none; color:#fff"> market@plpestindo.co.id</a><br>
                        <span class="glyphicon glyphicon-envelope"></span>
                        <a href="mailto:plpestindo@gmail.com" style="text-decoration:none; color:#fff">
                            plpestindo@gmail.com</a></p><br>
                    <h4>LOKASI KAMI</h4>
                    <p>
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="376" height="249" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=PT%20BERLIAN%20TRANSTAR%20ABADI%20JAKARTA&t=&z=9&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                    href="https://www.whatismyip-address.com/nordvpn-coupon/">nordvpn 2 year offer</a>
                            </div>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 249px;
                                    width: 376px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 249px;
                                    width: 376px;
                                }

                            </style>
                        </div>
                    </p>
                    <h4>TRANSLATE</h4>
                    <div id="google_translate_element"></div>

                    <script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({
                                pageLanguage: 'en'
                            }, 'google_translate_element');
                        }

                    </script>

                    <script type="text/javascript"
                        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    <a href="https://cww.verifytrustseal.com/verification/
eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkb21haW5JZCI6IjkyODIxIiwidGhlbWUiOiJkYXJrIiwiaG9zdG5hbWUiOiJsb2dpbi5jd2F0Y2guY29tb2RvLmNvbSIsImxhbmd1YWdlIjoiZW4iLCJpYXQiOjE1OTQyNjQ0Mjh9.qzHqn4OZ29k6siB0FLwGtrQyuMNjkzt1o04UJR6WTso?clang=en"
                        target="_blank"><img
                            src="https://cww.verifytrustseal.com/seal/eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkb21haW5JZCI6IjkyODIxIiwidGhlbWUiOiJkYXJrIiwiaG9zdG5hbWUiOiJsb2dpbi5jd2F0Y2guY29tb2RvLmNvbSIsImxhbmd1YWdlIjoiZW4iLCJpYXQiOjE1OTQyNjQ0Mjh9.qzHqn4OZ29k6siB0FLwGtrQyuMNjkzt1o04UJR6WTso?clang=en"
                            style="max-width:120; max-height:60; right:0px; bottom:0px; z-index:9999"
                            alt="cww trust seal"></a>
                </div>
            </div><br>
            <h4>BERIKAN WAKTU ANDA UNTUK MENGISI SURVEY YANG TELAH KAMI SEDIAKAN</h4>
            <a href="https://www.emailmeform.com/builder/form/hvT9ZiE8kuaNG31"><button
                    class="btn btn-default btn-lg">TAKE THE SURVEY!</button></a>
            <br><br><br>
            <!-- Footer -->
            <div class="row">
                <div class="col-sm-12">
                    <p><a href="LICENSE" target="_blank" style="color:#fff;">&copy;Copyright 2018</a> - <a
                            href="https://www.infinitysolutions.co.id" style="color:#fff;">Infinity Solutions</a><br>
                        Ref. Company Profile Aug 2018</p>
                </div>
            </div>
            <!-- End Footer -->
        </div>
    </section>
    <!-- End Contact -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5c296f057a79fc1bddf2bc18/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();

    </script>
    <!--End of Tawk.to Script-->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                },
                i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-130007559-1', 'auto');
        ga('send', 'pageview');

    </script>

</body>

</html>
