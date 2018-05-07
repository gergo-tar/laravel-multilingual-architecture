@extends('layouts.app')

@section('head-meta')
{!! SEO::generate(true) !!}
@endsection

@section('content')
    <div class="container">
    	{{-- Page title --}}
    	<h1 class="page-title">
			{{__('page.contact.page_title')}}
		</h1>
		{{-- Page sub-title --}}
		<h2 class="page-sub-title">
			{{__('page.contact.page_sub_title')}}
		</h2>
	  	<div class="row">
	  		<div class="col-lg-8 col-md-7 col-sm-12">
	  			{{-- Contact phone number --}}
	  			<div id="contactPhone">
	  			</div>
	  			{{-- Contact email --}}
	  			<div id="contactEmail">
	  			</div>
	  		</div>
	  		{{-- Contact image --}}
  			<div id="contactImageWrapper" class="col-lg-4 col-md-5 col-sm-12">
				<img src="{{asset(__('image.contact_page_image.name'))}}"
					alt="{{__('image.contact_page_image.alt')}}">
  			</div>
	  	</div>
  	</div>
@endsection

@section('scripts')
<script language=JavaScript type="text/javascript">
	/**
	 * Email obfuscation
	 */
	<!--
	var user = "{{config('app.contact_email_user')}}";
	var host = "{{config('app.contact_email_host')}}";
	var link = user + "@" + host;

	var contactEmail = document.getElementById('contactEmail')
	contactEmail.innerHTML += ""+
	"<a hre" + "f=mai" + "lto:" + user + "@" + host + "><b>" + link + "</b></a>";
	-->
</script>
@endsection