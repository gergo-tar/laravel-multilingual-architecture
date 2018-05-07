<div id="headerImageWrapper" class="text-center">
    <img src="{{asset(__('image.header_image.name'))}}"
        alt="{{__('image.header_image.alt')}}"
        class="img-fluid">
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <button class="navbar-toggler"
   type="button"
   data-toggle="collapse"
   data-target="#navbarSupportedContent"
   aria-controls="navbarSupportedContent"
   aria-expanded="false"
   aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      {{-- Home Page --}}
      <li class="nav-item {{(Request::route()->getName() == 'home' ? 'active' : '')}}">
        <a class="nav-link" href="{{ route('home') }}">
            {{__('menu.home')}}
        </a>
      </li>
      {{-- Posts Page --}}
      <li class="nav-item {{(Request::route()->getName() == 'posts.index' ? 'active' : '')}}">
        <a class="nav-link" href="{{route('posts.index')}}">
            {{__('menu.posts')}}
        </a>
      </li>
      {{-- Contact Page --}}
      <li class="nav-item {{(Request::route()->getName() == 'contact.index' ? 'active' : '')}}">
        <a class="nav-link" href="{{route('contact.index')}}">
            {{__('menu.contact')}}
        </a>
      </li>
      {{-- Facebook link --}}
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="{{config('app.facebook', '#')}}">
            {{__('menu.facebook')}}
        </a>
      </li>
      <li class="nav-item">
        <ul class="languagepicker">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a rel="alternate"
                      hreflang="{{$localeCode}}"
                      href="{{LaravelLocalization::getLocalizedURL($localeCode, null, [], true)}}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
        </ul>
      </li>
    </ul>
  </div>
</nav>