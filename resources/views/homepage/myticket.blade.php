<x-user-layout>

    <x-slot name='title'>Evento - Event</x-slot>

    <x-slot name='main'> 

        <main>
            <!--? Hero Start -->
            <div class="slider-area2">
                <div class="slider-height2 d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="hero-cap hero-cap2 text-center">
                                    <h2>My Tickets</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero End -->
    
            <section class="section-property section-t8 section-b4">
                <div class="container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title-wrap d-flex justify-content-between">
                                    <div class="title-box">
                                        <h2 class="title-a">My Bookings</h2>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                        <div id="" class="event-section owl-theme">
                            <div class="row">

                                {{-- Start Foreach Loop For Ticket Booking --}}
                                @foreach($tickets as $ticket)
                                {{-- Get Details of Events From Ticket & Event Relaion --}}
                                @php 
                                    $event = $ticket->event;
                                @endphp
                                <div class="carousel-item-b col-lg-4 col-md-6 col-sm-6 mb-4">
                                    <div class="card-box-a card-shadow box-shadow radius-10">
                                        <div class="img-box-a">
                                             {{-- Check For Image - Stored in Admin or Organiser Folder  --}}
                                            @if (file_exists('storage/admin/event/' . $event->event_image)) 
                                                <img src="{{ asset('storage/admin/event/'. $event->event_image) }}" alt="" class="img-a img-fluid">
                                            @else 
                                                <img src="{{ asset('storage/organiser/event/'. $event->event_image) }}" alt="" class="img-a img-fluid">
                                            @endif
                                        </div>
                                        <div class="card-overlay">
                                            <div class="card-overlay-a-content">
                                                <div class="card-header-a">
                                                    <h2 class="card-title-a">
                                                        <a href="">{{ $event->event_name }}</a>
                                                    </h2>
                                                </div>
                                                <div class="card-body-a">
                                                    <div class="price-box d-flex">
                                                        <span class="price-a">
                                                          {{ date('d-m-Y', strtotime($event->event_date)); }}
                                                        </span>
                                                    </div>
                                                    <a href="{{ route('ticketview', $ticket->id) }}" class="link-a" style="color:white">More Detail </a>
                                                </div>
                                                <div class="card-footer-a" style="background:#331391">
                                                    <ul class="card-info d-flex justify-content-around">
                                                        <li>
                                                            <h4 class="card-info-title" style="color: black; font-weight:bold">Ticket Number</h4>
                                                            <span>{{ $ticket->paymentno }}</span>
                                                        </li>
                                                        <li>
                                                            <h4 class="card-info-title" style="color: black; font-weight:bold">Price</h4>
                                                            <span>{{ $ticket->event_price }}</span>
                                                        </li>
                                                        <li>
                                                            <h4 class="card-info-title" style="color: black; font-weight:bold">Quantity</h4>
                                                            <span>{{ $ticket->quantity }}</span>
                                                        </li>
                                                        <li>
                                                            <h4 class="card-info-title" style="color: black; font-weight:bold">Total Amount</h4>
                                                            <span>{{ $ticket->payment_amount }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- End Foreach Loop For Ticket Booking --}}

                            </div>
                        </div>
                    </div>
            </section>
        </main>

    </x-slot>
</x-user-layout>