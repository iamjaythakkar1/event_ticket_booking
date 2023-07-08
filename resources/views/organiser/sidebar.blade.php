<div class="dash">
    <div class="dash-nav dash-nav-dark">
        <header>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a href="{{ url('organiser/dashboard') }}" style="margin-top: 10px;"><img src="{{ asset('Homepage\assets\img\logo\logo2_footer.png') }}" alt="Evento Logo"></a>
        </header>
        <nav class="dash-nav-list">
            <a href="{{ url('organiser/dashboard') }}" class="dash-nav-item">
                <i class="fas fa-home"></i>{{'Organiser'}}</a>

            <div class="dash-nav-dropdown">
                <a href="{{ url('organiser/event') }}" class="dash-nav-item">
                    <i class="far fa-calendar-plus"></i> {{'Events'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ url('organiser/speaker') }}" class="dash-nav-item">
                    <i class="fas fa-user-friends"></i> {{'Speakers'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ url('organiser/payment') }}" class="dash-nav-item">
                    <i class="fas fa-rupee-sign"></i> {{'Payments'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <a href="{{ url('organiser/profile') }}" class="dash-nav-item">
                    <i class="fas fa-user-circle"></i> {{'Profile'}} </a>
            </div>

            <div class="dash-nav-dropdown">
                <form method="POST" action="{{ route('organiser.logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('organiser.logout')"
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

            <form class="searchbox" action="{{ route('organiser.search') }}" method="GET" style="border: 1px solid #181f2c; border-radius: 5px; width: 49%">
                <input type="text" class="searchbox-input" placeholder="Type To Search" name="search">
                <a href="{{ route('organiser.search') }}" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
            </form>

        </header>