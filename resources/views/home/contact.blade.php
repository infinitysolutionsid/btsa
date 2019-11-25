<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146136873-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-146136873-1');
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{!!url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')!!}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{!! asset('css/home/style.css')!!}" rel="stylesheet" />
    <link rel="shortcut icon" href="{!!asset('images/icon.png')!!}" type="image/x-icon">
    {{-- SEO --}}
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    {{-- END --}}
    <meta name="title" content="starwhisper. | Contact Us">
    <meta name="keywords" content="clothing store, mens clothing, clothing brand, designer clothes, brand name, clothes, apparel, starwhisper, jual kaos terbaik">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="Bintang Jeremia Tobing">
    
    <title>starwhisper. | Contact us</title>
  </head>
  <body>
    {{-- Menu Navbar --}}
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff;">
      <a class="navbar-brand" href="/"><img src="{!!url('https://res.cloudinary.com/starwhisper/image/upload/v1565405773/web/navbarlogo_s1re4h.png')!!}" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse justify-content-end navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Shop</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a href="#" class="dropdown-item">Kaos</a>
                <a href="#" class="dropdown-item">Kemeja</a>
                <a href="#" class="dropdown-item">Topi</a>
            </div>
          </li> --}}
          <li class="nav-item">
              <a href="/about-us" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
              <a href="/contact" class="nav-link">Contact Us</a>
          </li>
        </ul>
      </div>
    </nav>
</div>
    {{-- NEW SECTION HERE --}}
    <section class="contactform py-5" id="contactform">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Contact us</h3>
                    <p>Have any questions? Send us an email to let us know your inquires</p>
                    @if (session('sukses'))
                    <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Successfull !!</strong> {{session('sukses')}}
                          </div>
                          @endif
                    <form action="/send" method="post">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="name">Your name</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Your name">
                            </div>
                            <div class="form-group col-6">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                            <small class="form-text text-muted">Starts from code area +62</small>
                        </div>
                        <div class="form-group">
                            <label for="messages">Your Messages</label>
                            <textarea name="messages" id="messages" rows="5" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-starwhisper">Submit!</button>
                    </form>
                </div>
                
            </div>
            
        </div>
    </section>
<section class="footercase" id="footercase">
        <div class="container text-center">
          <div class="row justify-content-center">
            <div class="col-lg-9 text-center">
              <div class="footer-widget mb-5">
                <img src="{!!url('https://res.cloudinary.com/starwhisper/image/upload/v1565405773/web/navbarlogo_s1re4h.png')!!}" alt="starwhisperid">
              </div>
              <div class="footer-widget mb-5">
                    <a href="/about-us">About us</a>
                    <a href="/termscondition">Terms &amp; Conditions</a>
                    <a href="/privacypolicy">Privacy &amp; Policy</a>
                    <a href="mailto:&#115;&#117;&#112;&#112;&#111;&#114;&#116;&#64;&#115;&#116;&#97;&#114;&#119;&#104;&#105;&#115;&#112;&#101;&#114;&#46;&#105;&#100;">Help</a>
                    <a href="/contact">Contact Us</a>
              </div>
            </div>
          </div>
            <div class="row justify-content-center">
              <div class="footer-widget">
                <a href="https://instagram.com/starwhisperid" target="_blank"><i class="fab fa-instagram fa-2x" data-toggle="tooltip" data-placement="top" title="Follow us on instagram"></i></a>
                <a href="http://nav.cx/e2pf6Sb" target="_blank"><i class="fab fa-line fa-2x" data-toggle="tooltip" data-placement="top" title="Lets be friend on Line"></i></a>
                <a href="https://facebook.com/starwhisperid" target="_blank"><i class="fab fa-facebook fa-2x" data-toggle="tooltip" data-placement="top" title="Add us on Facebook"></i></a>
                <a href="mailto:&#115;&#117;&#112;&#112;&#111;&#114;&#116;&#64;&#115;&#116;&#97;&#114;&#119;&#104;&#105;&#115;&#112;&#101;&#114;&#46;&#105;&#100;" target="_blank"><i class="fas fa-envelope fa-2x" data-toggle="tooltip" data-placement="top" title="Send us your inquires on emails"></i></a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="footerbottom" id="footerbottom">
        <div class="fluid">
          <div class="row">
            <div class="offset-1 col-md-6 text-left">
              <p>&copy;Copyright 2019 - starwhisper.</p>
            </div>
          </div>
        </div>
      </section>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{!!asset('js/home/home.js')!!}"></script>
  <script src="{!!url('https://kit.fontawesome.com/ae026c985d.js')!!}"></script>
  <script src="{!!url('https://code.jquery.com/jquery-3.3.1.slim.min.js')!!}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="{!!url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')!!}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{!!url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')!!}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>
</html>