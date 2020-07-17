<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Apply for job in BTSA Logistics">
    <meta name="author" content="Bintang J Tobing">
    <meta name="keywords" content="Apply Job, Apply Job BTSA Logistics, BTSA Logistics, Interviewer, Candidate">
    <link rel="shortcut icon"
        href="https://res.cloudinary.com/btsa-co-id/image/upload/v1541503574/jscsstxtfiledll/icon/starlogo.ico">
    <title>Apply for job @BTSA LOGISTICS</title>
    <script src="https://kit.fontawesome.com/ae026c985d.js" crossorigin="anonymous"
        type="93f47f1b769aaff014497fc3-text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link href="https://res.cloudinary.com/btsa-co-id/raw/upload/v1587520539/jscsstxtfiledll/candidate.css"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Apply for job</h2>
                </div>
                <form action="/candidate/proses" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-row">
                            <label for="" class="my-1 mr-2">Posisi yang dilamar</label>
                            <select required name="appliedposition" id="" class="custom-select my-1 mr-sm-2">
                                <option disabled>Pilih salah satu...</option>
                                <option value="Staff Accounting">Staff Accounting
                                </option>
                                <option value="Mekanik Perbaikan">Mekanik Perbaikan
                                </option>
                                <option value="Operator Depo">Operator Depo
                                </option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="headerbio">
                                <h1>Biodata Staff</h1>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Upload foto profil kamu <i class="fas fa-star-of-life"></i></label>
                                <input required type="file" name="profilephoto" class="form-control">
                                <small class="form-text text-muted">Foto profil harus diatur berukuran 3x4cm dengan
                                    ukuran
                                    dibawah 500kb</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Upload KTP <i class="fas fa-star-of-life"></i></label>
                                <input required type="file" name="ktpfile" class="form-control">
                                <small class="form-text text-muted">Foto KTP harus diatur
                                    dengan memiliki ukuran
                                    dibawah 500kb</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Upload SIM</label>
                                <input type="file" name="simfile" class="form-control">
                                <small class="form-text text-muted">Foto SIM harus diatur
                                    dengan memiliki ukuran
                                    dibawah 500kb</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama Lengkap <i class="fas fa-star-of-life"></i></label>
                                <input required type="text" class="form-control" placeholder="Nama Lengkap"
                                    name="nama_lengkap">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama Panggilan <i class="fas fa-star-of-life"></i></label>
                                <input required type="text" name="nama_panggilan" id="" placeholder="Nama Panggilan"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tempat Lahir <i class="fas fa-star-of-life"></i></label>
                                <select required name="tempat_lahir" id="" class="custom-select mr-sm-2">
                                    <option selected>Pilih salah satu...</option>
                                    @if(count($kota)>0)
                                    @foreach ($kota as $city)
                                    <option value="{{$city->city_name}}">{{$city->city_name}}
                                    </option>
                                    @endforeach
                                    @else
                                    <option disabled>Empty records</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Tanggal Lahir <i class="fas fa-star-of-life"></i></label>
                                <input required type="text" id="datepicker" name="tanggal_lahir" class=" form-control"
                                    data-position="right top" maxlength="10" pattern=".{10,}">
                                <small class="form-text text-muted">Format tanggal lahir: DD/MM/YYYY</small>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Gender: <i class="fas fa-star-of-life"></i></label>
                                <select required name="gender" class="custom-select mr-sm-2">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">No. NPWP</label>
                                <input type="text" name="NoNpwp" id="" class="form-control">
                                <small class="form-text text-muted">Masukkan nomor NPWP kamu jika kamu memilikinya /
                                    dalam
                                    sedang
                                    diperlukan.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">No. BPJS Kesehatan</label>
                                <input type="text" name="NoBpjs" id="" class="form-control">
                                <small class="form-text text-muted">Masukkan nomor BPJS kamu jika kamu memilikinya /
                                    dalam
                                    sedang
                                    diperlukan.</small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Suku <i class="fas fa-star-of-life"></i></label>
                                <select required name="suku" class="custom-select">
                                    @if(count($suku)>0)
                                    @foreach ($suku as $suku)
                                    <option value="{{$suku->suku_id}}">{{$suku->nama_suku}}
                                    </option>
                                    @endforeach
                                    @else
                                    <option disabled>Empty records</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Pendidikan Terakhir <i class="fas fa-star-of-life"></i></label>
                                <select required name="pendidikan" class="custom-select mr-sm-2">
                                    <option value="SMA/SMK">SMA/SMK</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Agama</label>
                                <select name="agama" class="custom-select">
                                    @if(count($agama)>0)
                                    @foreach ($agama as $agama)
                                    <option value="{{$agama->religion_id}}">{{$agama->religion_name}}
                                    </option>
                                    @endforeach
                                    @else
                                    <option disabled>Empty records</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Golongan Darah</label>
                                <select name="golongandarah" class="custom-select mr-sm-2">
                                    <option>Pilih Golongan Darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="">Anak ke:</label>
                                <select name="anak_ke" id="" class="custom-select mr-sm-2">
                                    <option>Pilih anak ke</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Provinsi: <i class="fas fa-star-of-life"></i></label>
                                <select required name="provinsi" id="provinsi" class="custom-select mr-sm-2">

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Kota Domisili: <i class="fas fa-star-of-life"></i></label>
                                <select required name="domisili" id="domisili" class="custom-select mr-sm-2">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Kecamatan: <i class="fas fa-star-of-life"></i></label>
                                <select required name="kecamatan" id="kecamatan" class="custom-select mr-sm-2">
                                    <option value="">Pilih</option>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Kelurahan: <i class="fas fa-star-of-life"></i></label>
                                <select required name="kelurahan" id="kelurahan" class="custom-select mr-sm-2">
                                    <option value="">Pilih</option>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat KTP <i class="fas fa-star-of-life"></i></label>
                                <textarea name="alamatKtp" cols="30" rows="6" class="form-control"
                                    placeholder="Sesuai alamat KTP kamu"></textarea>
                                <small class="form-text text-muted">Alamat yang diisi harus sesuai dengan alamat yang
                                    tertera di
                                    KTP.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat Tinggal <i class="fas fa-star-of-life"></i></label>
                                <textarea name="alamatTinggal" cols="30" rows="6" class="form-control"
                                    placeholder="Alamat tempat tinggal kamu sekarang"></textarea>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Status Rumah <i class="fas fa-star-of-life"></i></label>
                                <select required name="statusrumah" class="custom-select mr-sm-2">
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Milik Keluarga">Milik Keluarga</option>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                    <option value="Kos">Kos</option>
                                    <option value="Menumpang">Menumpang</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email aktif <i class="fas fa-star-of-life"></i></label>
                                <input required type="text" name="email" id="" class="form-control"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                <small class="form-text text-muted">Format email: <a href="/cdn-cgi/l/email-protection"
                                        class="__cf_email__"
                                        data-cfemail="0568646c694568646c692b666a68">[email&#160;protected]</a></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">No. HP yang bisa dihubungi <i class="fas fa-star-of-life"></i></label>
                                <input required type="text" name="noHp" id="" class="form-control" pattern=".{12,}">
                                <small class="form-text text-muted">Format nomor HP: 0812********</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Info Lowongan dari <i class="fas fa-star-of-life"></i></label>
                                <select required name="info_lowongan" class="custom-select mr-sm-2" id="">
                                    <option value="Media Sosial">Media Sosial</option>
                                    <option value="Koran/Majalah/Media Cetak lainnya">Koran/Majalah/Media Cetak lainnya
                                    </option>
                                    <option value="Internet/Browsing">Internet/Browsing</option>
                                    <option value="Teman/Keluarga/Pihak lain...">Teman/Keluarga/Pihak lain...</option>
                                    <option value="Lain Lain">Lain Lain</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Tanggal masuk kerja</label>
                                <input type="text" name="req_datein" class="datepicker-here form-control"
                                    data-position="right top" data-language="en" maxlength="10" pattern=".{10,}">
                                <small class="form-text text-muted">Format tanggal masuk kerja: DD/MM/YYYY</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Gaji yang diharapkan</label>
                                <select name="income" id="" class="custom-select mr-sm-2">
                                    <option disabled>Pilih salah satu...</option>
                                    <option value=">Rp.1.000.000">>Rp.1.000.000</option>
                                    <option value=">=Rp.2.000.000">>=Rp.2.000.000</option>
                                    <option value=">=Rp.3.500.000">>=Rp.3.500.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload CV</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input required class="form-control" type="file" name="file_cv" id="file">
                                </div>
                                <div class="label--desc">Upload your CV/Resume or any other relevant file. Max file size
                                    2
                                    MB
                                </div>
                            </div>
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

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"
        type="93f47f1b769aaff014497fc3-text/javascript">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"
        type="93f47f1b769aaff014497fc3-text/javascript">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"
        type="93f47f1b769aaff014497fc3-text/javascript">
    </script>

    <script type="93f47f1b769aaff014497fc3-text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js">
    </script>
    <script type="93f47f1b769aaff014497fc3-text/javascript">
        $(function () {
            $('input[name="tanggal_lahir"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
            });
        });

    </script>
    <script type="93f47f1b769aaff014497fc3-text/javascript">
        $(function () {
            $('input[name="req_datein"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {});
        });

    </script>
    <script type="93f47f1b769aaff014497fc3-text/javascript"
        src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="93f47f1b769aaff014497fc3-text/javascript"
        src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="93f47f1b769aaff014497fc3-|49" defer=""></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            loadProvinsi();

            function loadProvinsi() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'GET',
                    url: '/candidate/get-provinsi',
                    success: function (response) {
                        console.log(response);
                        let html = "<option value=''>Pilih provinsi</option>";
                        response.map(function (v) {
                            html += `<option value="${v.provinces_id}">${v.name}</option>`;
                        })
                        $('#provinsi').html(html);
                    },
                    error: function (err) {
                        console.log("error", err);
                    }
                });
            }
            $('#provinsi').change(function () {
                var provinsi = $("#provinsi").val();
                $.ajax({
                    method: 'GET',
                    url: '/candidate/get-domisili/' + provinsi,
                    success: function (response) {
                        console.log(response);
                        let html = "<option value=''>Pilih domisili</option>";
                        response.map(function (v) {
                            html += `<option value="${v.id}">${v.name}</option>`;
                        })
                        $("#domisili").html(html);
                    }
                });
            });

            $("#domisili").change(function () {
                var domisili = $("#domisili").val();
                console.log("kecamatan", kecamatan);
                $.ajax({
                    method: 'GET',
                    url: "/candidate/get-kecamatan/" + domisili,
                    success: function (response) {
                        console.log(response);
                        let html = "<option value=''>Pilih kecamatan</option>";
                        response.map(function (v) {
                            html += `<option value="${v.id}">${v.name}</option>`;
                        })
                        $("#kecamatan").html(html)
                    }
                });
            });

            $("#kecamatan").change(function () {
                var kecamatan = $("#kecamatan").val();
                console.log("kelurahan", kelurahan);
                $.ajax({
                    method: 'GET',
                    url: "/candidate/get-kelurahan/" + kecamatan,
                    success: function (response) {
                        console.log(response);
                        let html = "<option value=''>Pilih kelurahan</option>";
                        response.map(function (v) {
                            html += `<option value="${v.id}">${v.name}</option>`;
                        })
                        $("#kelurahan").html(html)
                    }
                });
            });
        });

    </script>
</body>

</html>
