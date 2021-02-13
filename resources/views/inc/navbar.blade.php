<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a herf class="/" class="navbar-brand">
      <img src="{{ asset('images/logo.png') }}" alt="" class="d-inline-block align-top" height="70" width="70">
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>
          @if (Auth::check())
          <a href="/portal" class="nav-item nav-link">Portal</a>
            @else
            <a href="/" class="nav-item nav-link">Home</a>
            @endif
          <a href="/about" class="nav-item nav-link">About</a>
          <a href="/contact" class="nav-item nav-link">Contact</a>
         <!--  <a href="/services" class="nav-item nav-link">Services</a>
          <a href="/posts" class="nav-item nav-link">Blog</a>-->

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          @if (Auth::user()->role_id == Null )
                            <a class="dropdown-item" href="{{ route('complete-profile') }}">Complete profile</a>
                          @endif
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>
