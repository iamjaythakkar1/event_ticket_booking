<div class="dash">
    <div class="dash-nav dash-nav-dark">
        <header>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a href="{{ route('admin.dashboard') }}" style="margin-top: 10px;"><img src="{{ asset('Homepage\assets\img\logo\logo2_footer.png') }}" alt="Evento Logo"></a>
        </header>

        <nav class="dash-nav-list">
            <a href="{{ route('admin.dashboard') }}" class="dash-nav-item">
                <i class="fas fa-home"></i>{{'Admin Dashboard'}} </a>

            <div class="dash-nav-dropdown">
                <a href="{{ url('admin/organiser') }}" class="dash-nav-item">
                    <i class="fas fa-user-tie"></i> {{'Organisers'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ url('admin/user') }}" class="dash-nav-item">
                    <i class="far fa-user"></i> {{'Users'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ url('admin/event') }}" class="dash-nav-item">
                    <i class="far fa-calendar-plus"></i> {{'Events'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('admin.payment') }}" class="dash-nav-item">
                    <i class="fas fa-rupee-sign"></i> {{'Payments'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ url('admin/category') }}" class="dash-nav-item">
                    <i class="fas fa-tasks"></i> {{'Category'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ url('admin/speaker') }}" class="dash-nav-item">
                    <i class="fas fa-user-friends"></i> {{'Speaker'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ route('admin.profile') }}" class="dash-nav-item">
                    <i class="fas fa-user-circle"></i> {{'Profile'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('admin.logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
           
        </nav>
    </div>
    <div class="dash-app">
        <header class="dash-toolbar">
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>

            {{-- Error / Success Message Print --}}

            <form class="searchbox" action="{{ route('admin.search') }}" method="GET" style="border: 1px solid #181f2c; border-radius: 5px; width: 49%">
                <input type="text" class="searchbox-input" placeholder="Type To Search" name="search">
                <a href="{{ route('admin.search') }}" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
            </form>
        </header>