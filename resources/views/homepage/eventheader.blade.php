<div class="header-area">
    <div class="main-header header-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-xl-2 col-lg-2 col-md-1">
                    <div class="logo">
                        <a href="index.php"><img src="{{ asset('homepage/assets/img/logo/logo.png') }}" alt="Evento Logo"></a>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-10 col-md-10">
                    <div class="menu-main d-flex align-items-center justify-content-end">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home" style="padding-right: 10px;"></i>Home</a></li>
                                    <li><a class="nav-link" href="#about"><i class="fa fa-solid fa-info" style="padding-right: 10px;"></i>About</a></li>
                                    <li><a href="#speaker" class="nav-link"><i class="fas fa-solid fa-user-tie" style="padding-right: 10px;"></i>Spakers</a></li>
                                    <li><a href="#schedule" class="nav-link"><i class="fas fa-regular fa-calendar-check" style="padding-right: 10px;"></i>Schedule</a></li>
                                    <li><a href="#price" class="nav-link"><i class="fa fa-rupee" aria-hidden="true" style="padding-right: 10px;"></i>Price</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right-btn f-right d-none d-lg-block ml-30">
                            {{-- Check for User Session  --}}
                                <a href="{{ route('login') }}" class="btn header-btn">Login / Register</a>
                            {{-- Check for User Session  --}}
                                <a href="{{ route('logout') }}" class="btn header-btn">Logout</a>
                            {{-- Check for User Session  --}}
                        </div>
                    </div>
                </div>

                {{-- Error / Success Message --}}

                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>