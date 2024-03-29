<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">{{$setting->web_name}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav m-auto">
                <form class="form-inline my-2 my-lg-0" action="" method="GET">
                    <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline btn-sm my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
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
                            <a class="nav-link btn btn-primary crayons-btn btn-create-account" href="{{ route('register') }}">{{ __('Create new account') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary crayons-btn btn-create-post" href="{{route('user.post.create')}}">
                            {{__('Create Post')}}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="image mr-2 ml-2">
                                <img class="preview rounded-circle "
                                src="{{asset('uploads/users/' . Auth::user()->profile->image)}}"
                                alt="user image" width="30" height="30">
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('profile.index')}}">
                                <div class="profile">
                                    <h5>{{ Auth::user()->name }}</h5>
                                    <span>
                                        {{ Auth::user()->email }}
                                    </span>
                                </div>
                            </a>
                            <hr />
                            <a class="dropdown-item" href="{{route('user.dashboard')}}">
                                {{ __('Dashboard') }}
                            </a>
                            <a class="dropdown-item" href="{{route('user.post.create')}}">
                                {{__('Create Post')}}
                            </a>

                            <a class="dropdown-item" href="{{route('profile.setting')}}">
                                {{ __('Setting') }}
                            </a>
                            <hr />
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
