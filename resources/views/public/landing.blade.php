@extends('layouts.app')

@section('head-meta')
{!! SEO::generate(true) !!}
@endsection

@section('content')
    <div class="container">
    	{{-- Page title --}}
    	<h1 class="page-title">
			{{__('page.landing.page_title')}}
		</h1>
		{{-- Page sub-title --}}
		<h2 class="page-sub-title">
			{{__('page.landing.page_sub_title')}}
		</h2>
	  	<div class="row">
	  		{{-- Page content --}}
	  		<div id="landingPageContent" class="col-lg-8 col-md-7 col-sm-12">
	  			{!!__('page.landing.content')!!}
	  		</div>
	  		{{-- Page banner --}}
  			<div id="landingPageRightBanner" class="col-lg-4 col-md-5 col-sm-12">
  				{{-- Banner image --}}
				<img id="landingPageImage"
				 	src="{{asset(__('image.landing_page_image.name'))}}"
					alt="{{__('image.landing_page_image.alt')}}">
				<br/>
  			</div>
	  	</div>
  	</div>
@endsection