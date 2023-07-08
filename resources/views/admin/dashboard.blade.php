<x-admin-layout>

    <x-slot name='title'>Admin - Dashboard</x-slot>

    <x-slot name='main'>
    <main class="dash-content">
        <div class="container-fluid">
            <!-- <h1 class="dash-title">Admin Dashboard</h1> -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="stats stats-primary">
                        <a href="{{ url('admin/user') }}" style="color: white; text-decoration: none">
                            <h3 class="stats-title"> Users </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $user }}</div>
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
                        <a href="{{ url('admin/organiser') }}" style="color: white; text-decoration: none">
                            <h3 class="stats-title"> Organisers </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $organiser }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-success">
                        <a href="{{ url('admin/event') }}" style="color: white; text-decoration: none">
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
                    <div class="stats stats-info">
                        <a href="{{ route('admin.payment') }}" style="color: white; text-decoration: none">
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
                    <div class="stats stats-light">
                        <a href="{{ route('admin.payment') }}" style="color: white; text-decoration: none">
                            <h3 class="stats-title" style="color:black"> Amount </h3>
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
                <div class="col-lg-4">
                    <div class="stats stats-dark">
                        <a href="{{ url('admin/event') }}" style="color: white; text-decoration: none">
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
                    <div class="stats stats-danger">
                        <a href="{{ url('admin/event') }}" style="color: white; text-decoration: none">
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
                    <div class="stats stats-primary">
                        <a href="{{ url('admin/speaker') }}" style="color: white; text-decoration: none">
                            <h3 class="stats-title"> Speakers </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $speaker }}</div>
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
                        <a href="{{ url('admin/category') }}" style="color: white; text-decoration: none">
                            <h3 class="stats-title"> Category </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $category }}</div>
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
</x-admin-layout>