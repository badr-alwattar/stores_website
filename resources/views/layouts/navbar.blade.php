

<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm px-4">
    {{-- <div class="container"> --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Bytek') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    @if(Auth::check())
                        @if(Auth::user()->role_id == 2 && Auth::user()->store_id == null)
                            <a href="#"><a href="/stores/create" class="btn btn-outline-success "  >  Create Store  </a></a>
                        @endif
                        @if(Auth::user()->role_id == 2 && Auth::user()->store_id != null)
                        <a href="#"><a href='/stores/{{Auth::user()->store_id}}' class="btn btn-outline-primary "  >  Show Store  </a></a>
                        <a href="#"><a href='/stores/{{Auth::user()->store_id}}/edit' class="btn btn-outline-warning "  >  Edit Store  </a></a>
                        @endif
                    @endif
                {{-- <a href="#"><a href="/games/create" class="btn btn-outline-primary" style="margin-top:4px;" >  Add Game  </a></a> --}}
                </li>
            </ul>

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
                @if(Auth::check())
                    @if (Auth::user()->role_id == 1)
                    <li class="nav-item">
                    <a href="#"><a href='/carts/{{Auth::user()->cart_id}}' class="btn btn-success mr-2">  Show Cart  </a></a>
                    </li>

                    <li class="nav-item">
                        <a href="#"><a href='/orders/show' class="btn btn-primary mr-2">  Show Order  </a></a>
                        </li>
                    @endif
                @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    {{-- </div> --}}
</nav>




    <div class="row py-4 px-4">
        <div class="col">
            @if(Auth::check())
                @if(Auth::user()->role_id == 2 && Auth::user()->store_id != null)
                    <a href="#"><a href='/products/create' class="btn btn-success align-right mb-3"  >  Add product  </a></a>
                @endif
            @endif
        </div>
    </div>

