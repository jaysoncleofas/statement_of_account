<nav class="navbar is-info is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a href="/home" class="navbar-item">
            <img src="{{ asset('img/nextvation-logo.png') }}" alt="">
            </a>

            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>

        </div>
        <div class="navbar-menu" id="navMenu">
            <!-- navbar start, navbar end -->
            <div class="navbar-end">
                @guest
                    {{-- <a class="navbar-item" href="{{ route('login') }}">
                        Login
                    </a>
                    <a class="navbar-item" href="{{ route('register') }}">
                        Register
                    </a>     --}}
                @else 
                    <a class="navbar-item" href="{{ route('home') }}">
                       Statement of Account
                    </a>
                    <a class="navbar-item" href="{{ route('client.index') }}">
                        Clients
                    </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <p><i class="fa fa-user mr-2"></i>{{Auth::user()->email}}</p>
                        </a>
                        <div class="navbar-dropdown is-right">
                            <a class="navbar-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off mr-2"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>