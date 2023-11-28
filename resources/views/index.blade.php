@extends('layout')

@section('content')
    <section id="beranda" data-anchor="beranda">
		<div class="slider-banner">
			@foreach($banner as $ban)
			@if($ban->type == 2)
			<div class="item">
				<div class="bg-banner">
					<div class="tbl">
						<div class="cell">
							<div class="container">
								<div class="row">
									<div class="col-md-6 col-lg-5">
										<div class="t animated">{{ $ban->title }}</div>
										<div class="bdy animated">
											{!! $ban->description !!}
										</div>
										<div class="text-center animated">
										@if($ban->link)
											<a class="link-btn click-hubungi" href="{{ $ban->link }}">siap pesan</a>
										@endif	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="abs-img"><img src="{{asset('upload/'.$ban->image)}}" title="" alt=""/></div>
				</div>
			</div>
			@else
			<div class="item">
				<div class="bg-banner">
					<div class="tbl">
						<div class="cell">
							<div class="container">
								<div class="row">
									<div class="col-md-6 my-auto">
										<div class="img">
											<img src="{{asset('upload/'.$ban->image)}}" title="" alt=""/>
										</div>
									</div>
									<div class="col-md-6 col-lg-5 my-auto offset-lg-1">
										<div class="t text-right animated">
											<div>{{ $ban->title }}</div>
										</div>
										<div class="bdy animated text-right">
											{!! $ban->description !!}
										</div>
										<div class="text-center animated">
											@if($ban->link)
											<a class="link-btn click-hubungi" href="{{ $ban->link }}">siap pesan</a>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="abs-img"><img src="{{asset('images/banner3.png?v.1')}}" title="" alt=""/></div>
				</div>
			</div>
			@endif
			@endforeach
		</div>
		<div class="bg" id="siap" style="background: url('{{asset('images/banner-siap.png?v.1')}}') no-repeat bottom;">
			<div class="container">
				<div class="t sr-up-td1">Lakucreative siap membantu Anda!</div>
				<div class="bdy sr-up-td2">7 Alasan Anda dapat Percaya LakuCreative Yaitu...</div>
				<div class="row">
					<div class="col-md-6 col-lg-5">
						<div class="bdr sr-left-td3">Brand Anda Akan ditangani oleh profesional Brand Consultant berpengalaman</div>
						<div class="bdr sr-left-td4">Brand Anda Akan ditangani oleh profesional Marketing Designer berpengalaman</div>
						<div class="bdr sr-left-td5">Brand Anda Akan ditangani oleh profesional Content Creator berpengalaman</div>
						<div class="bdr sr-left-td6">Implementasi konsep sesuai dengan keinginan dan kebutuhan Anda</div>
					</div>
					<div class="col-md-6 col-lg-5 offset-lg-1">
						<div class="bdr sr-left-td7">Pengerjaan dan penyelesaian pesanan sesuai dengan waktu yang ditentukan</div>
						<div class="bdr sr-left-td8">Harga yang ditawarkan tidak akan memberatkan keinginan dan kebutuhan Anda.</div>
						<div class="bdr sr-left-td9">Konsultasi yang sangat mudah hanya Chat melalui Whatsapp saja</div>
						<div class="text-center sr-left-td10">
							<button class="link-btn click-hubungi">siap pesan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="tentang-kami" data-anchor="tentang-kami">
		<div class="bg" id="tentang">
			<div class="container">
				<div class="t sr-up-td1">
					<div>Kenapa sih perlu</div>
					<div>Lakucreative?</div>
				</div>
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<Div class="bdy sr-up-td2">
							<p>Jaman sekarang, konsumen udah pada pinter, apa-apa promosi sana sini, capek tawarin produk tapi tidak laku-laku. Bener gak? Untuk para usahawan, penting banget nih sekarang brandnya mudah <span class="blue">dikenali dan diingat</span>, bagaimana caranya? Tahap awal untuk memperluas jaringan pemasaran adalah dengan memiliki <span class="blue">brand sendiri</span>.</p> 
							<p>Untuk mengenal lebih dalam apakah Lakucreative itu, yuk klik di bawah ini:</p>
						</Div>
						<div class="text-center sr-up-td3">
							<a href="{{ URL::to('/tentang-kami') }}">
								<button class="link-btn">Tentang Kami</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="jasa-desain" data-anchor="jasa-desain">
		<div class="bg" id="desain">
			<div class="container">
				<div class="bdr-desain"></div>
				<div class="t sr-up-td1">
					<div>Semua Desain untuk</div>
					<div>kebutuhan Anda!</div>
				</div>
				<div class="tab-content">
					<?php $i=1; ?>
					@foreach($design as $list)
						
						<div class="tab-pane fade @if($i==1) show active @else fade @endif" id="{{ $list->slug }}" role="tabpanel" aria-labelledby="{{ $list->slug }}-tab">
							<div class="row">
								@foreach($list->design_image as $image)
								<div class="col-6 col-md-3 my-auto sr-up-td2">
									<div class="img">
										<a href="{{asset('upload/'.$image->image)}}" data-fancybox="{{ $list->slug }}">
											<img src="{{asset('upload/'.$image->image)}}" title="" alt=""/>
										</a>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
					<?php $i++; ?>
					@endforeach
					<!-- <div class="tab-pane fade" id="kemasan" role="tabpanel" aria-labelledby="kemasan-tab">
						<div class="row">
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/big-kemasan1.png?v.1')}}" data-fancybox="kemasan">
										<img src="{{asset('images/kemasan1.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/big-kemasan2.png?v.1')}}" data-fancybox="kemasan">
										<img src="{{asset('images/kemasan2.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/big-kemasan3.png?v.1')}}" data-fancybox="kemasan">
										<img src="{{asset('images/kemasan3.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/big-kemasan4.png?v.1')}}" data-fancybox="kemasan">
										<img src="{{asset('images/kemasan4.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="marketing" role="tabpanel" aria-labelledby="marketing-tab">
						<div class="row">
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/big-marketing1.png?v.1')}}" data-fancybox="marketing">
										<img src="{{asset('images/marketing1.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
							<div class="col-6 col-md-3 my-auto">
								<div class="img small">
									<a href="{{asset('images/marketing2.png?v.1')}}" data-fancybox="marketing">
										<img src="{{asset('images/marketing2.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/big-marketing3.png?v.1')}}" data-fancybox="marketing">
										<img src="{{asset('images/marketing3.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/marketing4.png?v.1')}}" data-fancybox="marketing">
										<img src="{{asset('images/marketing4.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="stationery" role="tabpanel" aria-labelledby="stationery-tab">
						<div class="row">
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/big-stationery1.png?v.1')}}" data-fancybox="stationery">
										<img src="{{asset('images/stationery1.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/big-stationery2.png?v.1')}}" data-fancybox="stationery">
										<img src="{{asset('images/stationery2.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/big-stationery3.png?v.1')}}" data-fancybox="stationery">
										<img src="{{asset('images/stationery3.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
							<div class="col-6 col-md-3 my-auto">
								<div class="img">
									<a href="{{asset('images/big-stationery4.png?v.1')}}" data-fancybox="stationery">
										<img src="{{asset('images/stationery4.png?v.1')}}" title="" alt=""/>
									</a>
								</div>
							</div>
						</div>
					</div> -->
				</div>
				<ul class="nav nav-pills" role="tablist">
					<?php $j=1; ?>
					@foreach($design as $des)
					<li class="nav-item sr-up-td2">
						</a>
						<a class="@if($j==1) active @else nav-link @endif" id="{{ $des->slug }}-tab" data-toggle="pill" href="#{{ $des->slug }}" role="tab" aria-controls="{{ $des->slug }}" aria-selected="true">{{ $des->name }}</a>
						{!! $des->description !!}
					</li>
					<?php $j++; ?>
					@endforeach
					<!-- <li class="nav-item sr-up-td3">
						<a class="nav-link" id="kemasan-tab" data-toggle="pill" href="#kemasan" role="tab" aria-controls="kemasan" aria-selected="false">Kemasan</a>
						<ul class="l-desain">
							<li>Packaging</li>
							<li>Label</li>
						</ul>
					</li>
					<li class="nav-item sr-up-td4">
						<a class="nav-link" id="marketing-tab" data-toggle="pill" href="#marketing" role="tab" aria-controls="marketing" aria-selected="false">Marketing Kit</a>
						<ul class="l-desain">
							<li>Banner</li>
							<li>Brosur</li>
							<li>Flyer</li>
							<li>Poster</li>
						</ul>
					</li>
					<li class="nav-item sr-up-td5">
						<a class="nav-link" id="stationery-tab" data-toggle="pill" href="#stationery" role="tab" aria-controls="stationery" aria-selected="false">Stationery</a>
						<ul class="l-desain">
							<li>Kartu Nama</li>
							<li>Kop Surat</li>
							<li>Nota</li>
							<li>Dll</li>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>
	</section>


	<section id="cara-pemesanan" data-anchor="cara-pemesanan">
		<div class="bg getMenu" id="cara" style="background: url('{{asset('images/banner-carakerja.jpg?v.1')}}') no-repeat center;">
			<div class="container">
				<div class="t item sr-up-td1">cara kerja</div>
				<div class="t2 item sr-up-td2">
					<div>Langkah Mudah Pemesanan</div>
					<div>Desain Lakucreative</div>
				</div>
				<div class="row">
					@foreach($cara_kerja as $cara)
					<div class="col-20 item sr-up-td3">
						<div class="item-cell">
							<div class="img"><img src="{{asset('upload/'.$cara->image)}}" alt="{{ $cara->title }}" title="{{ $cara->title }}"/></div>
						</div>
						<div class="item-cell pl15">
							<div class="nm">{{ $cara->title }}</div>
							<div class="text">{!! $cara->description !!}</div>
						</div>
					</div>
					@endforeach
					
				</div>
			</div>
		</div>
	</section>


	<section id="testimonial" data-anchor="testimonial">
		<div class="bg getMenu" id="testimoni">
			<div class="abs-testi">
				<img src="{{asset('images/banner-testimoni.png?v.1')}}" title="" alt=""/>
			</div>
			<div class="abs-testi-left">
				<img src="{{asset('images/testi1.png?v.1')}}" title="" alt=""/>
			</div>
			<div class="abs-testi-right">
				<img src="{{asset('images/testi2.png?v.1')}}" title="" alt=""/>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-7 sr-left-td1">
						<div class="img"><img src="{{asset('upload/'.$mengapa->image)}}" alt="" title=""/></div>
					</div>
					<div class="col-md-6 col-lg-5 sr-right-td1">
						<div class="pl50">
							<div class="t">{{ $mengapa->title }}</div>
							<div class="bdy">
								{!! $mengapa->description !!}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-testi">
				<div class="container">
					<div class="t2">Testimoni</div>
					<div class="slider-testimoni">
						@foreach($testimonial as $testi)
						<div class="item">
							<div class="bdy-testi">
								{!! $testi->testimonial !!}
							</div>
							<div class="nm-testi">{{ $testi->name }}</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="hubungi-kami" data-anchor="hubungi-kami">
		<div class="bg getMenu" id="hubungi">
			<div class="container">
				<div class="t">
					<div>Siap bangun brand Anda dengan</div>
					<div>Lakucreative? Hubungi kami!</div>
				</div>
				<div class="row">
					<div class="col-6 col-md-3 offset-md-2 product-animated-left">
						<div class="item">
							<div class="img"><img src="{{asset('upload/'.$hubungi_kami->pesan_image)}}" alt="" title=""/></div>
							<a href="{{ $hubungi_kami->pesan_link }}" target="_blank"> 
								<img src="{{asset('images/btn1.png?v.1')}}" alt="" title=""/>
							</a>
						</div>
					</div>
					<div class="col-6 col-md-3 offset-md-2 product-animated-right">
						<div class="item">
							<div class="img"><img src="{{asset('upload/'.$hubungi_kami->chat_image)}}" alt="" title=""/></div>
							<a href="{{ $hubungi_kami->chat_link }}" target="_blank"> 
								<img src="{{asset('images/btn2.png?v.1')}}" alt="" title=""/>
							</a>
						</div>
					</div>
				</div>
				<div class="metode product-animated-top">
					<div class="t2">Metode Pembayaran</div>
					<ul class="l">
						@foreach($bank as $bankk)
						<li><img src="{{asset('upload/'.$bankk->image)}}" alt="{{ $bankk->name }}" title="{{ $bankk->name }}"/></li>
						@endforeach
					</ul>
				</div>	
			</div>
		</div>
	</section>
    
@endsection

@section('js')

<script type="text/javascript">
	$(document).ready(function() {
		$('.slider-banner').on('init', function(event, slick){
            $('.animated').addClass('activate fadeInUp');
        });

        $('.slider-banner').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            infinite: true,
            autoplay: true,
            arrows: false,
            autoplaySpeed: 3500,
            responsive: [
	        {
	            breakpoint: 768,
	            settings: {
	                adaptiveHeight: true
	            }
	        }
	        ]
        });

        $('.slider-banner').on('afterChange', function(event, slick, currentSlide) {
            $('.animated').removeClass('off');
            $('.animated').addClass('activate fadeInUp');
        });

        $('.slider-banner').on('beforeChange', function(event, slick, currentSlide) {
            $('.animated').removeClass('activate fadeInUp');
            $('.animated').addClass('off');
        });

		$('.slider-testimoni').slick({
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        dots: false,
	        infinite: true,
	        autoplay: true,
	        centerMode: false,
	        autoplaySpeed: 2000,
	        arrows: true,
	        responsive: [
	        {
	            breakpoint: 768,
	            settings: {
	                slidesToShow: 1,
	                slidesToScroll: 1,
	                adaptiveHeight: true
	            }
	        }
	        ]
	    });

	    $("[data-fancybox]").fancybox({
			infobar : false,
			buttons : [
				'close'
			],
			loop: true,
		});
	});	
</script>
@endsection