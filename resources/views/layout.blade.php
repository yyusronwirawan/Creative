<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="facebook-domain-verification" content="glx19dsjahpp4ef8o2z7xd6i79f2rf" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>@if(isset($metadata->title)) {{ $metadata->title }} @else Lakucreative @endif</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png?v.1')}}" />

    @if(isset($metadata->description))

    <meta name="description" content="{{ $metadata->description }}">

    @else

    <meta name="description" content="Jasa desain Jasa desain grafis">

    @endif



    @if(isset($metadata->keyword))

    <meta name="keywords" content="{{ $metadata->keyword }}">

    @else

    <meta name="keywords" content="Jasa desain, Jasa desain grafis">

    @endif

    

    <!-- CSS -->

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('slick/slick.css') }}">

    <link rel="stylesheet" href="{{ asset('slick/slick-theme.css') }}">

    <link rel="stylesheet" href="{{ asset('fancybox/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

    <link rel="stylesheet" href="{{ asset('css/front.css?v.1') }}">

    

</head>

<body>



    <header>

        <div class="header-top"> </div>

        <div class="header-bottom">

            <div class="container">

                <div class="row">

                    <div class="col-6 col-md-3 my-auto">

                        <div class="logo">

                            <a href="{{ url('') }}">

                                <img src="{{asset('upload/'.$logo->image)}}" alt="" title=""/>

                            </a>

                        </div>

                    </div>

                    <div class="col-6 col-md-9 my-auto text-right">

                        <div class="menu">

                            <i class="fas fa-bars"></i>

                        </div>

                        <div class="main-menu hidden-xs">

                            <nav>

                                @foreach($menu as $men)

                                <a href="{{ $men->link }}" data-scroll="{{ $men->slug }}">{{ $men->menu }}</a>  

                                @endforeach

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </header>



    <div id="main">

        @yield('content')

    </div>



    <footer class="getMenu" id="kontak">

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-lg-5 xs30">

                    <div class="t-footer"><a class="click-desain">Sedia jasa desain</a></div>

                    <ul class="l-footer">

                        @foreach($design as $a)

                        <li><a href="#desain" style="color: white">{{ $a->name }}</a></li>

                        @endforeach

                    </ul>

                </div>

                <div class="col-md-5 col-lg-5 xs30">

                    <div class="t-footer">Kontak Kami</div>

                    <div class="link">

                        <a href="tel:{{ $company_data->whatsapp }}"><img src="{{asset('images/phone.png?v.1')}}"/> {{ $company_data->whatsapp }}</a>

                    </div>

                    <div class="link">

                        <a href="mailto:{{ $company_data->email }}"><img src="{{asset('images/mail.png?v.1')}}"/> {{ $company_data->email }}</a>

                    </div>

                </div>

                <div class="col-md-3 col-lg-2">

                    <div class="t-footer">Social Links</div>

                    @foreach($social_media as $sos)

                    <div class="link">

                        <a @if($sos->link) href="{{ $sos->link }}" @endif target="_blank"><img src="{{asset('upload/'.$sos->image)}}"/> {{ $sos->name }} </a>  

                    </div>

                    @endforeach

                </div>

            </div>

            <div class="cp">Copyright &copy; <a href="https://api.whatsapp.com/send?phone=628977707814" target="_blank">stefanstar</a> <?php echo date("Y"); ?></div>

        </div>

    </footer>



    <div class="fixed-top">

        <a>

            <div class="tbl">

                <div class="cell">

                    <div class="img">

                        <img src="{{asset('images/arrow.png?v.1')}}"/>

                        <div>TOP</div>

                    </div>

                </div>

            </div>

        </a>

    </div>



    <div class="fixed-message">

        <a href="{{ $hubungi_kami->pesan_link }}" target="_blank">

            <div class="tbl">

                <div class="cell">

                    <div class="txt">

                        <div>Pesan</div>

                        <div>Sekarang</div>

                    </div>

                    <div class="img">

                        <img src="{{asset('images/message.png?v.1')}}"/>

                    </div>

                </div>

            </div>

        </a>

    </div>



    <div class="fixed-question">

        <a href="{{ $hubungi_kami->chat_link }}" target="_blank">

            <div class="tbl" style="padding-top: 3px;">

                <div class="cell">

                    <div class="txt">

                        <div class="fz13">Info & Pertanyaan</div>

                        <div>Hubungi kami</div>

                    </div>

                    <div class="img">

                        <img src="{{asset('images/question.png?v.1')}}"/>

                    </div>

                </div>

            </div>

        </a>

    </div>

    <div class="overlay"></div>
    <div class="slide-menu">
        <div class="box-close">
            <i class="fas fa-times"></i>
        </div>
        <div class="pad20">
           <nav>
                <a href="index.php" data-scroll="beranda">Beranda</a>  
                <a href="index.php#tentang-kami" data-scroll="tentang-kami">Tentang Kami</a>  
                <a href="index.php#desain" data-scroll="jasa-desain">Jasa Desain</a>  
                <a href="index.php#cara-pemesanan" data-scroll="cara-pemesanan">Cara Pemesanan</a>
                <a href="index.php#testimonial" data-scroll="testimonial">Testimoni</a>
                <a href="index.php#hubungi-kami" data-scroll="hubungi-kami">Hubungi Kami</a>
            </nav>
        </div>
    </div>





<!-- JS -->

<script type="text/javascript" src="{{ asset('jquery-3.3.1.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('fancybox/jquery.fancybox.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('scrollreveal.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('web.js') }}"></script>

@yield('js')



</body>

</html>

        

