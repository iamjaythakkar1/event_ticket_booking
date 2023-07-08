<x-organiser-layout>

    <x-slot name='title'>Organiser Dashboard</x-slot>

    <x-slot name='main'>
    <main class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="stats stats-success">
                        <a href="{{ url('organiser/event') }}" style="text-decoration: none; color: white">
                            <h3 class="stats-title">Events</h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $event }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-secondary">
                        <a href="{{ url('organiser/event') }}" style="text-decoration: none; color: white">
                            <h3 class="stats-title"> Active Events </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $aevent }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-primary">
                        <a href="{{ url('organiser/event') }}" style="text-decoration: none; color: white">
                            <h3 class="stats-title"> Completed Events </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $cevent }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-info">
                        <a href="{{ url('organiser/payment') }}" style="text-decoration: none; color: white">
                            <h3 class="stats-title"> Tickets </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $ticket }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-warning">
                        <a href="{{ url('organiser/payment') }}" style="text-decoration: none; color: white">
                            <h3 class="stats-title"> Amount </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-rupee-sign"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $amount }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </x-slot>
</x-organiser-layout>