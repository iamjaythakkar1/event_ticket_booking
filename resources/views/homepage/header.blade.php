<div class="header-area">
    <div class="main-header header-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-xl-2 col-lg-2 col-md-1">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('homepage/assets/img/logo/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10">
                    <div class="menu-main d-flex align-items-center justify-content-end">
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li> <a class="nav-link active" href="{{ route('home') }}"><i class="fa fa-home" style="padding-right: 10px;"></i>Home</a></li>
                                    <li> <a class="nav-link " href="{{ route('event') }}"><i class="fa fa-calendar" style="padding-right: 10px;"></i>Events</a></li>
                                    <li><a class="nav-link " href="{{ route('category') }}"><i class="fa fa-calendar" style="padding-right: 10px;"></i>Explore Category</a></li>
                                    {{-- Check for Session  --}}
                                    @auth
                                        <li><a class="nav-link " href="{{ route('mytickets') }}"><i class="fas fa-ticket-alt" style="padding-right: 10px;"></i>My Tickets</a></li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right-btn f-right d-none d-lg-block ml-30">
                            {{-- Check for Session --}}
                            @auth
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn header-btn">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn header-btn">Login / Register</a>
                            @endauth
                        </div>
                    </div>
                </div>

                {{-- Error / Success Message --}}
                
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>