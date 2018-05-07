@extends('layouts.app')

@section('head-meta')
{!! SEO::generate(true) !!}
@endsection

@section('content')
    <div id="postsList" class="container">
    	<h1 class="page-title">
			{{__('page.posts.page_title')}}
		</h1>
		<div class="row">
	    @forelse($posts as $post)
	    	{{-- Get the translation model according to the current locale --}}
	    	@php
	    	$translation = $post->getTranslation($locale, true);
	    	@endphp

	    	<div class="post-card col-lg-4 col-md-6 col-12">
	    		{{-- Post image --}}
				<img class="img-fluid"
					src="{{$post->post_thumbnail ? asset('uploads/posts/' . $post->post_thumbnail) : null}}"
					alt="{{$translation ? $translation->title : null}}">
				{{-- Post link --}}
				<a href="{{$translation ? route('posts.show', [$translation->slug]) : null}}">
				  	<div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
				  		{{-- Post title --}}
				    	<h5 class="card-title">
				    		{{$translation ? $translation->title : null}}
				    	</h5>
				    	{{-- Post description --}}
					    <p class="card-text">
					    </p>
				  	</div>
				</a>
			</div>
		@empty
	    @endforelse
		</div>
	</div>
@endsection