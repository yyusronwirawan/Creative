@extends('layout')

@section('content')
    <div class="pad-tentang">
		<div class="container">
			<?php $i=1; ?>
			@foreach($tentang_kami as $tentang)
			@if ($i % 2 == 0)
			<div class="pad50">
				<div class="row">
					<div class="col-md-6 order-2 order-md-1 right sr-left-td2">
						<div class="t">{{ $tentang->title }}</div>
						<div class="bdy">
							{!! $tentang->description !!}
						</div>
					</div>
					<div class="col-md-6 order-1 order-md-2 sr-right-td2">
						<div class="img"><img src="{{asset('upload/'.$tentang->image)}}" title="" alt=""/></div>
					</div>
				</div>
			</div>
			@else
			<div class="pad50">
				<div class="row">
					<div class="col-md-6 sr-left-td1">
						<div class="img"><img src="{{asset('upload/'.$tentang->image)}}" title="" alt=""/></div>
					</div>
					<div class="col-md-6 sr-right-td1">
						<div class="t">{{ $tentang->title }}</div>
						<div class="bdy">
							{!! $tentang->description !!}
						</div>
					</div>
				</div>
			</div>
			@endif
			<?php $i++; ?>
			@endforeach
		</div>
	</div>
    
@endsection

@section('js')

<script type="text/javascript">
	$(document).ready(function() {
		$('.nav_home').addClass('active');
	});	
</script>
@endsection