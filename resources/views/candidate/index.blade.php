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
    <title>Apply for job @BTSA LOGISTICS</title>
    <script src="https://kit.fontawesome.com/ae026c985d.js" crossorigin="anonymous"></script>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Main CSS/JS-->
    <script src="{!!asset('js/datepicker/datepicker.js')!!}"></script>
    <script src="{!!asset('js/datepicker/datepicker.en.js')!!}"></script>
    <link href="{!!asset('css/candidate.css')!!}" rel="stylesheet">

</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Apply for job</h2>
                </div>
                <?php $tokens = str_random(60); ?>
                <form action="/candidate/proses/{{$tokens}}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <label for="" class="my-1 mr-2">Posisi yang dilamar</label>
                            <select name="appliedposition" id="" class="custom-select my-1 mr-sm-2">
                                <option selected disabled>Pilih salah satu...</option>
                                @if(count($loker)>0)
                                @foreach ($loker as $lowongan)
                                <option value="{{$lowongan->available_position}}">{{$lowongan->available_position}}
                                </option>
                                @endforeach
                                @else
                                <option disabled>Empty records</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="headerbio">
                                <h1>1. Biodata Staff</h1>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Upload foto profil kamu <i class="fas fa-star-of-life"></i></label>
                                <input type="file" name="profilephoto" class="form-control" required>
                                <small class="form-text text-muted">Foto profil harus diatur berukuran 3x4cm dengan
                                    ukuran
                                    dibawah 400kb</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Upload KTP <i class="fas fa-star-of-life"></i></label>
                                <input type="file" name="ktpfile" class="form-control" required>
                                <small class="form-text text-muted">Foto KTP harus diatur
                                    dengan memiliki ukuran
                                    dibawah 400kb</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Upload SIM <i class="fas fa-star-of-life"></i></label>
                                <input type="file" name="simfile" class="form-control">
                                <small class="form-text text-muted">Foto SIM harus diatur
                                    dengan memiliki ukuran
                                    dibawah 400kb</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama Lengkap <i class="fas fa-star-of-life"></i></label>
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama Panggilan</label>
                                <input type="text" name="nama_panggilan" id="" placeholder="Nama Panggilan"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tempat Lahir <i class="fas fa-star-of-life"></i></label>
                                <select name="tempat_lahir" id="" class="custom-select mr-sm-2" required>
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
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Lahir <i class="fas fa-star-of-life"></i></label>
                                <input type="text" name="tanggal_lahir" class="datepicker-here form-control"
                                    data-position="right top" data-language="en" required maxlength="10"
                                    pattern=".{10,}">
                                <small class="form-text text-muted">Format tanggal lahir: DD/MM/YYYY</small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">No. KTP <i class="fas fa-star-of-life"></i></label>
                                <input type="text" name="NoKtp" id="" class="form-control" maxlength="16" required
                                    pattern=".{16,}">
                                <small class="form-text text-muted">Nomor KTP harus dimasukkan karena bersifat
                                    wajib.<br>No.KTP biasanya mempunyai 16 digit angka.</small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">No. SIM</label>
                                <input type="text" name="NoSim" id="" class="form-control">
                                <small class="form-text text-muted">Masukkan nomor SIM kamu jika kamu memilikinya /
                                    dalam sedang
                                    diperlukan.</small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">No. NPWP</label>
                                <input type="text" name="NoNpwp" id="" class="form-control">
                                <small class="form-text text-muted">Masukkan nomor NPWP kamu jika kamu memilikinya /
                                    dalam
                                    sedang
                                    diperlukan.</small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">No. BPJS Kesehatan</label>
                                <input type="text" name="NoBpjs" id="" class="form-control">
                                <small class="form-text text-muted">Masukkan nomor NPWP kamu jika kamu memilikinya /
                                    dalam
                                    sedang
                                    diperlukan.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Suku</label>
                                <select name="suku" class="custom-select">
                                    @if(count($suku)>0)
                                    @foreach ($suku as $sukuid)
                                    <option value="{{$sukuid->nama_suku}}">{{$sukuid->nama_suku}}
                                    </option>
                                    @endforeach
                                    @else
                                    <option disabled>Empty records</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Agama</label>
                                <select name="agama" class="custom-select">
                                    @if(count($agama)>0)
                                    @foreach ($agama as $agm)
                                    <option value="{{$agm->religion_name}}">{{$agm->religion_name}}
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
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="">Anak ke:</label>
                                <select name="anak_ke" id="" class="custom-select mr-sm-2">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat KTP <i class="fas fa-star-of-life"></i></label>
                                <input type="text" name="alamatKtp" class="form-control" required>
                                <small class="form-text text-muted">Alamat yang diisi harus sesuai dengan alamat yang
                                    tertera di
                                    KTP.</small>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="">Alamat Tinggal <i class="fas fa-star-of-life"></i></label>
                                <input type="text" name="alamatTinggal" class="form-control" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Status Rumah <i class="fas fa-star-of-life"></i></label>
                                <select name="statusrumah" class="custom-select mr-sm-2" required>
                                    <option value="kontrak">Kontrak</option>
                                    <option value="MilikKeluarga">Milik Keluarga</option>
                                    <option value="MilikSendiri">Milik Sendiri</option>
                                    <option value="kos">Kos</option>
                                    <option value="menumpang">Menumpang</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email aktif <i class="fas fa-star-of-life"></i></label>
                                <input type="text" name="email" id="" class="form-control" required
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                <small class="form-text text-muted">Format email: mail@mail.com</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">No. HP yang bisa dihubungi <i class="fas fa-star-of-life"></i></label>
                                <input type="text" name="noHp" id="" class="form-control" required pattern=".{12,}">
                                <small class="form-text text-muted">Format nomor HP: 0812********</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Info Lowongan dari <i class="fas fa-star-of-life"></i></label>
                                <select name="info_lowongan" class="custom-select mr-sm-2" required id="">
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
                                    data-position="right top" data-language="en" required maxlength="10"
                                    pattern=".{10,}">
                                <small class="form-text text-muted">Format tanggal masuk kerja: DD/MM/YYYY</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Gaji yang diharapkan</label>
                                <select name="income" id="" class="custom-select mr-sm-2" required>
                                    <option selected>Pilih salah satu...</option>
                                    <option value=">Rp.1.000.000">>Rp.1.000.000</option>
                                    <option value=">=Rp.2.000.000">>=Rp.2.000.000</option>
                                    <option value=">=Rp.5.000.000">>=Rp.5.000.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload CV</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file_cv" id="file" required>
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
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

    <!-- Jquery JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- Main JS-->
    <script src="{!!asset('js/candidate.js')!!}"></script>
    {{-- <script>
      // Initialization
      $('#datepicker-here').datepicker({
         language: 'en',
      })
      // Access instance of plugin
      $('#datepicker-here').data('datepicker')
   </script> --}}

</body>

</html>
