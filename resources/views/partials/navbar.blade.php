<div class="background-black-nav"></div>

<div class="nav-wrapper">
    <nav class="navbar bg-white py-1 border-bottom navbar-top">
        <div class="aj-navbar-left">
            <span class="btn">
                <i class="fas fa-bars"></i>
            </span>
        </div>
        <div class="m-auto">
            <img src="{{ asset('images/logo.svg') }}" alt="Apt logo" draggable="false" class="apt-logo">
        </div>
        <div class="aj-navbar-right text-dim number-font">
            <i class="far fa-calendar-alt"></i>
            {{ date('l, F jS, Y') }}
        </div>
    </nav>

    <nav class="navbar bg-white py-0 border-bottom shadow-sm navbar-bottom">
        <a href="#" class="close-nav d-flex">
            <span class="m-auto">
                <i class="fas fa-times"></i>
                Close
            </span>
        </a>
        <div class="container">
            <ul class="nav aj-nav">
                <li class="mx-3">
                    <a href="{{ url('/') }}" class="d-flex{{ Request::is('/') ? ' active' : '' }}">
                        <span class="m-auto">Home</span>
                    </a>
                </li>
                <li class="mx-3">
                    <a href="#" class="d-flex">
                        <span class="m-auto">About</span>
                    </a>
                </li>
                <li class="mx-3">
                    <a href="#" class="d-flex">
                        <span class="m-auto">Academics</span>
                    </a>
                </li>
                <li class="mx-3">
                    <a href="{{ route('admission.index') }}" class="d-flex{{ Request::is('admission') ? ' active' : '' }}">
                        <span class="m-auto">Admission</span>
                    </a>
                </li>
                <li class="mx-3">
                    <a href="{{ url('/contact') }}" class="d-flex{{ Request::is('contact') ? ' active' : '' }}">
                        <span class="m-auto">Contact Us</span>
                    </a>
                </li>
            </ul>

            <ul class="nav aj-nav nav-right aj-nav-right">
                @gguest
                    <li class="mx-3">
                        <a href="{{ route('login') }}" class="d-flex{{ Request::is('login') ? ' active' : '' }}">
                            <span class="m-auto">{{ __('Login') }}</span>
                        </a>
                    </li>
                    <li class="mx-3">
                        <a href="{{ route('register') }}" class="d-flex{{ Request::is('register') ? ' active' : '' }}">
                            <span class="m-auto">{{ __('Register') }}</span>
                        </a>
                    </li>
                @endgguest

                @gauth
                    @if (Guard::getLoggedInGuard() == 'admin')
                        <li class="mx-3">
                            <a href="{{ route('admin.') }}" class="d-flex{{ Request::segment(1) == 'admin' ? ' active' : '' }}">
                                <span class="m-auto">{{ __('Admin') }}</span>
                            </a>
                        </li>
                    @else
                        <li class="mx-3">
                            <a href="{{ route('profile.index') }}" class="d-flex{{ Request::segment(1) == 'profile' ? ' active' : '' }}">
                                <span class="m-auto">{{ __('Profile') }}</span>
                            </a>
                        </li>
                    @endif
                    <li class="mx-3">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-flex">
                            <span class="m-auto">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endgauth
            </ul>
        </div>
    </nav>

</div>
