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
    <title>Berhasil! Surat lamaran anda telah berhasil dikirim.</title>
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
            <div class="card">
                <div class="card-body">
                    <div class="form-row v2">
                        <h1>Selamat! Lamaran anda telah kami terima.</h1>
                        <p class="justify-center">Silahkan tunggu untuk panggilan interview anda. Anda akan segera kami
                            hubungi
                            untuk masuk ke
                            tahap selanjutnya di <strong>BTSA LOGISTICS</strong>. Harap tetap mengaktifkan email/nomor
                            telepon
                            yang sudah tercantum di formulir lowongan kerja. Jika ada kesalahan pada formulir tadi,
                            diharapkan segera untuk menghubungi kami di nomor <a href="tel:06180032999">+62
                                6180032999</a> atau jika kamu tidak menerima jawaban dari receiptionist kami, kamu dapat
                            mengirimkan pesan ke <a href="mailto:hrd@btsa.co.id">hrd@btsa.co.id</a>.</p>
                    </div>
                    <div class="form-row v2 text-right">
                        <?php $today = date('l, d-m-Y') ?>
                        <p class="text-right">Medan, {{$today}}</p>
                    </div>
                    <div class="form-row v2">
                        <p><strong>Personalia BTSA LOGISTICS</strong></p>
                    </div>

                </div>
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
