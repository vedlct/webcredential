@include('layouts.header')

<body>
<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a href="{{ route('welcome') }}" class="logo">
                <span>Web Credential</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">


            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{{ url('public/assets/img/user.jpg') }}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
                    <span>Profile</span>
                </a>
                <div class="dropdown-menu">

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
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
{{--            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                <a class="dropdown-item" href="{{route('user')}}">User</a>--}}
{{--                <a class="dropdown-item" href="{{route('admin')}}">Admin</a>--}}

{{--            </div>--}}
        </div>
    </div>

    @include('layouts.sidebar')




    <div class="page-wrapper">
        <div class="content">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @yield('content')


        </div>

    </div>
</div>

@include('layouts.footer')





