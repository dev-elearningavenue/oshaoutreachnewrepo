@extends('layouts.promotional_sale')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Payment Failed | '.config('app.name') )

@section('styles')
	@if(isset($page['seo_tags']))
		@foreach($page['seo_tags'] as $meta_name => $meta_content)
			@if($meta_name != 'title')
				<meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
			@endif
		@endforeach
	@endif
@endsection

@section('content')
	<section class="hero-banner --inner-banner" style="background-image: url('{{ asset('images/banner-about-us.jpg') }}')">
		<div class="inner-content">
			<div class="container">
				<h1 class="title">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Oops! Payment Failed' }}</h1>
			</div>
		</div>
	</section>

	<section class="home-intro sec-padding">
		<div class="container">
			<h2 class="title">Sorry!</h2>
			<p class="subtitle">Your order is not successful, kindly try again. <br /><br/>
				{{--Please check your confirmation email for more details.<br/>--}}
				{{--Our Guy wi--}}
				{{--If you have any questions, please contact us at <a href="mailto:info@eupepsia.com" target="_blank">info@eupepsia.com</a> or <a href="tel:+1 (276) 722 0584" target="_blank">+1 (276) 722 0584</a>.<br/><br/>--}}
				{{--We look forward to welcoming you!<br/><br/>--}}
				<a class="fc-primary" href="{{ route('home') }}">Go Back to Home Page</a>
			</p>
		</div>
	</section>
@endsection