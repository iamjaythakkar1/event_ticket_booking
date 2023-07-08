<x-user-layout>

    <x-slot name='title'>Evento - Homepage</x-slot>

    <x-slot name='main'>
    
    <!-- Intro Start -->
    <div class="intro intro-carousel">
        <div id="carousel" class="owl-carousel owl-theme">
            {{ $flag = 0 }}
            @foreach($events as $event)
            
            @if (file_exists('storage/admin/event/' . $event->event_image)) 
                <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset('storage/admin/event/'. $event->event_image) }})">
            @else 
                <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset('storage/organiser/event/'. $event->event_image) }})">
            @endif
                    <div class="overlay overlay-a" style="position:absolute">
                        <div class="intro-content display-table">
                            <div class="table-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="intro-body">
                                                <h1 class="intro-title mb-4">
                                                    {{ $event->event_name }}
                                                </h1>
                                                <p class="intro-subtitle intro-price">
                                                    <a href="{{ url('event/detail/'.$event->id) }}"><span class="price-a introbtn" style="border:#331391">More Detail</span></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $flag++ }}
                    @if($flag == 4)
                        @break
                    @endif
                @endforeach
     
        </div>
    </div>
    <!-- Intro Ends -->

    <!-- Latest Events Start -->
    <main id="main">
        <section class="section-property section-t8 section-b4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="title-a">Latest Events</h2>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="" class="event-section owl-theme">
                    <div class="row">

                       @foreach($events as $event)
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
                                                <a href="{{ url('event/detail/'.$event->id) }}" class="link-a" style="color:white">More Detail </a>
                                            </div>
                                            <div class="card-footer-a" style="background:#331391">
                                                <ul class="card-info d-flex justify-content-around">
                                                    <li>
                                                        <h4 class="card-info-title" style="color: black; font-weight:bold">Type</h4>
                                                        <span>{{ $event->category_name }}</span>
                                                    </li>
                                                    <li>
                                                        <h4 class="card-info-title" style="color: black; font-weight:bold">Price</h4>
                                                        <span>{{ $event->event_price }}</span>
                                                    </li>
                                                    <li>
                                                        <h4 class="card-info-title" style="color: black; font-weight:bold">Sold</h4>
                                                        <span>{{ $event->total_ticket  - $event->available_ticket}} Ticket</span>
                                                    </li>
                                                    <li>
                                                        <h4 class="card-info-title" style="color: black; font-weight:bold">Available</h4>
                                                        <span>{{ $event->available_ticket }} Ticket</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- Latest Events Ends -->

        <!-- Featured category Starts -->
        <section class="section-news section-t4 section-b4 mt-4 bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="title-a">Featured Category</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="" class="category-section">
                    <div class="row">

                        {{-- Different Category --}}
                        @foreach($categories as $category)
                        <div class="carousel-item-c col-lg-3 col-md-6 col-sm-6">
                            <div class="card-box-b card-shadow news-box radius-10">
                                <div class="img-box-b">
                                    <img src="{{ asset('storage/admin/category/'. $category->category_image) }}" alt="" class="img-b img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-header-b">
                                        <div class="card-title-b">
                                            <h2 class="title-2">
                                                <a href="{{ url('category/' . $category->category_name) }}">{{ $category->category_name }}</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Featured Category Ends -->
    </x-slot>
</x-user-layout>