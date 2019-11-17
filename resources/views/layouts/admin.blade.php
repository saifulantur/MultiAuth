<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

    {{--    <title>Hello, world!</title>--}}
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                BookShare
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                @if(Auth::check())
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('dashboard')}}">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('userList')}}">User List</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('index')}}">Create Author</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Create Prokashoni</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Create Location</a>
                        </li>
                    </ul>
                @endif
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8 col-sm-12">
                @yield('content')
            </div>
        </div>

    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"--}}
{{--        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"--}}
{{--        crossorigin="anonymous"></script>--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="{{ asset('js/toastr.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

{{--<script src="{{ asset('js/toastr.min.js') }}"></script>--}}




<script>

    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
    @if(Session::has('updated'))
    toastr.warning("{{ Session::get('updated') }}")
    @endif
    @if(Session::has('deleted'))
    toastr.warning("{{ Session::get('deleted') }}")
    @endif



    @if($errors->all())
    @foreach($errors->all() as $error)
    toastr.error("{{$error}}")
    @endforeach
    @endif


</script>
</body>
</html>
