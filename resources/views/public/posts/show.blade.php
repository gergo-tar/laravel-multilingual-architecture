@extends('layouts.app')

@section('head-meta')
{!! resolve('seotools')->generate() !!}
@endsection

@section('content')
    <div id="post" class="container">
      {{-- Post title --}}
    	<div class="row">
    		<div id="postTitle" class="col-12">
          <h1>
            {{$translation ? $translation->title : null}}
          </h1>
    		</div>
    	</div>
  		<div class="row">
        {{-- Post content --}}
  			<div id="postContent" class="col-lg-8 col-md-7 col-sm-12">
  	  			{!!$translation ? $translation->content : null!!}
  	  	</div>
        {{-- Post image --}}
        <div id="postImageWrapper" class="col-lg-4 col-md-5 col-sm-12">
        @if($image)
        <img src="{!!asset('uploads/posts/' . $image)!!}"
          alt="{{$translation ? $translation->title : null}}"
          class="img-fluid">
        @endif
        <br/>
        </div>
  	</div>
  </div>
@endsection