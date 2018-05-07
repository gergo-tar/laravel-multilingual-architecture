@extends('layouts.app-admin')

@section('content')
<div class="container">
  <table class="table">
    <thead>
        <tr>
            <th scope="col">locale</th>
            <th scope="col">title</th>
            <th scope="col">slug</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
        //$posts->withTranslation()->get();
        @endphp
        @forelse($posts as $post)
          @forelse($post->translations as $translation)
          <tr>
              <td scope="row">
                {{$translation->locale}}
              </td>
              <td>
                {{$translation->title}}
              </td>
              <td>
                {{$translation->slug}}
              </td>
              <td>
                <a href="{{ route('admin.posts.edit', [$translation->id]) }}" >
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
              </td>
          </tr>
          @empty
          @endforelse
        @empty
        @endforelse
   </tbody>
  </table>
</div>
@endsection