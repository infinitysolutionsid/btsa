<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Apply for job in BTSA Logistics">
    <meta name="author" content="Bintang J Tobing">
    <meta name="keywords" content="Apply Job, Apply Job BTSA Logistics, BTSA Logistics, Interviewer, Candidate">

    <!-- Title Page-->
    <link rel="shortcut icon"
        href="https://res.cloudinary.com/btsa-co-id/image/upload/v1541503574/jscsstxtfiledll/icon/starlogo.ico">
    <title>Step 2 of 3 | Apply for job @BTSA LOGISTICS</title>
    <script src="https://kit.fontawesome.com/ae026c985d.js" crossorigin="anonymous"></script>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Main CSS/JS-->
    <script src="{!!asset('js/datepicker/datepicker.js')!!}"></script>
    <script src="{!!asset('js/datepicker/datepicker.en.js')!!}"></script>
    <link href="{!!asset('css/datepicker/datepicker.css')!!}" rel="stylesheet" media="all">
    <link href="{!!asset('css/candidate.css')!!}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Apply for job</h2>
                </div>
                <?php $tokens = str_random(60); ?>
                <form action="/candidate/proses" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Well done!</h4>
                                    <p>Aww yeah! Kamu berhasil mendaftar formulir lowongan kerja di BTSA Logistics.<br>
                                        <strong>Langkah 1 dari 3 telah berhasil.</strong></p>
                                    <hr class="mt-3">
                                    <p class="mt-2">
                                        Silahkan lengkapi data dibawah ini lagi ya.</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="headerbio">
                                <h1>2. Info Lainnya</h1>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="">1. Apakah anda pernah melamar atau bekerja di BTSA Logistics? Jika pernah
                                kapan?</label>
                            <input type="text" name="melamar" class="form-control ml-3">
                        </div>
                        <div class="form-row">
                            <label for="">2. Apakah anda memiliki kenalan/teman/saudara yang bekerja di BTSA LOGISTICS?
                                Jika ada, siapa dan jabatannya apa?</label>
                            <input type="text" name="kenalan" class="form-control ml-3">
                        </div>
                        <div class="form-row">
                            <label for="">3. Apakah anda memiliki kenalan/teman/saudara yang bekerja di perusahaan lain
                                atau memiliki usaha dibidang ekspedisi?</label>
                            <input type="text" name="kenalan" class="form-control ml-3">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Riwayat kesehatan</label>
                                <select name="kesehatan" id="" class="custom-select">
                                    <option value="Jarang sakit / Pulih dalam waktu singkat">Jarang sakit / Pulih dalam
                                        waktu singkat</option>
                                    <option value="Jarang sakit / Pulih dalam waktu singkat">Jarang sakit / Pulih dalam
                                        waktu singkat</option>
                                    <option value="Pernah cidera parah / sakit tertentu">Pernah cidera parah / sakit
                                        tertentu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Perokok?</label>
                                <select name="perokok" id="" class="custom-select">
                                    <option value="Perokok">Ya</option>
                                    <option value="Tidak perokok">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Kondisi Penglihatan</label>
                                <select name="penglihatan" id="" class="custom-select">
                                    <option value="Buta warna">Buta warna</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Memakai lensa mata">Memakai lensa mata</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Kondisi Pendengaran</label>
                                <select name="pendengaran" id="" class="custom-select">
                                    <option value="Pendengaran baik">Baik</option>
                                    <option value="Pendengaran kurang baik">Kurang baik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Kondisi pekerjaan yang diharapkan</label>
                                <select name="kondisipekerjaan" id="" class="custom-select">
                                    <option value="Kantoran">Kantoran</option>
                                    <option value="Lapangan">Lapangan</option>
                                    <option value="Kantor & Lapangan">Kantor & Lapangan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""></label>
                                <input type="text" name="alasan" id="" class="form-control mt-2"
                                    placeholder="Berikan alasannya">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="">Bersedia Lembur?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lembur" id="inlineRadio1"
                                        value="Ya">
                                    <label class="form-check-label" for="inlineRadio1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lembur" id="inlineRadio2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Bersedia kerja shift/aplusan?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lembur" id="inlineRadio1"
                                        value="Ya">
                                    <label class="form-check-label" for="inlineRadio1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lembur" id="inlineRadio2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Bersedia dinas luar kota?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lembur" id="inlineRadio1"
                                        value="Ya">
                                    <label class="form-check-label" for="inlineRadio1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lembur" id="inlineRadio2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Penempatan luar kota?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lembur" id="inlineRadio1"
                                        value="Ya">
                                    <label class="form-check-label" for="inlineRadio1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lembur" id="inlineRadio2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Bersedia kunjungan keluar kota?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lembur" id="inlineRadio1"
                                        value="Ya">
                                    <label class="form-check-label" for="inlineRadio1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="lembur" id="inlineRadio2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="">Coba anda ceritakan mengenai diri dan kepribadian anda.</label>
                                <textarea name="aboutyou" class="form-control" id="" cols="30" rows="8"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Send Application</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Jquery JS-->
    <script src="{!!asset('vendor/jquery/jquery.min.js')!!}"></script>
    <!-- Main JS-->
    <script src="{!!asset('js/candidate.js')!!}"></script>

</body>

</html>
