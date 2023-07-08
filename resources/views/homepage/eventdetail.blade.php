<x-user-layout>

    <x-slot name='title'>Evento - Event</x-slot>

    <x-slot name='main'> 
<main>
    
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-9 col-sm-10">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay=".1s">Evento</span>
                                <h1 data-animation="fadeInLeft" data-delay=".5s">{{ $events->event_name }}
                                </h1>
                                <!-- Hero-btn -->
                                <div class="slider-btns">
                                    <a data-animation="fadeInLeft" data-delay="1.0s" href="#price" class="btn hero-btn">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Counter Section Begin -->
        <div class="counter-section d-none d-sm-block">
            <div class="cd-timer" id="">
                <div class="cd-item">
                    <span id="day"></span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span id="hour"></span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span id="min"></span>
                    <p>Min</p>
                </div>
                <div class="cd-item">
                    <span id="second"></span>
                    <p>Sec</p>
                </div>
            </div>
        </div>
        <!-- Counter Section End -->

    </div>
    <!-- slider Area End-->

    <!--? About Law Start-->
    <section class="about-low-area section-padding2" id="about" style="padding-top: 100px; margin-bottom:50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <h2>{{ $events->event_name }}</h2>
                        </div>
                        <p>{{ $events->event_description }}</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <div class="single-caption mb-20">
                                <div class="caption-icon">
                                    <span class="flaticon-communications-1"></span>
                                </div>
                                <div class="caption">
                                    <h5>Where</h5>
                                    {{-- Event Address --}}
                                    <p>{{ $events->event_address .', '. $events->event_city .', '. $events->event_state .'.' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <div class="single-caption mb-20">
                                <div class="caption-icon">
                                    <span class="flaticon-education"></span>
                                </div>
                                <div class="caption">
                                    <h5>When</h5>
                                    {{-- Event Date --}}
                                    <p>{{ date('d-m-Y', strtotime($events->event_date)); }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#price" class="btn mt-50">Get Your Ticket</a>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="{{ asset('homepage/assets/img/gallery/about2.png') }}" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="{{ asset('homepage/assets/img/gallery/about1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Law End-->

    <!--? Brand Area Start -->

    {{-- Check for Event Speaker  --}}
    @if(count($events->speakers) > 0)
        <section class="team-area pt-50 pb-50 section-bg" data-background="{{ asset('homepage/assets/img/gallery/section_bg02.png') }}" id="speaker" style="padding-top:190px; padding-bottom:0px">
            <div class="container">
                <div class="row" style="flex-direction: column; ">
                    <div class="col-md-9">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-50">
                            <h2 style="align-items: center;">The Most Importent Speakers.</h2>
                            <!-- <a href="#" class="btn white-btn mt-30">View Speaker</a> -->
                        </div>
                    </div>

                    <div class="row pl-30" style="flex-direction: row; ">
                        @foreach($events->speakers as $speaker)
                        <div class="single-team mb-30">            
                            <div class="team-img mr-50" >
                               
                                @if (file_exists('storage/admin/speaker/' . $speaker->speaker_image)) 
                                    <img src="{{ asset('storage/admin/speaker/'. $speaker->speaker_image) }}" alt="">
                                @else 
                                    <img src="{{ asset('storage/organiser/speaker/'. $speaker->speaker_image) }}" alt="">
                                @endif
                                
                            </div>
                            <div class="team-caption mr-50">
                                <h3><a>{{ $speaker->speaker_name }}</a></h3>
                                <p>{{ $speaker->speaker_description }}</p>  
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </section>
        @endif
    <!-- Brand Area End -->

    <!--? accordion -->
    <section class="accordion fix section-padding30" id="schedule" style="padding-top: 100px; padding-bottom: 0px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-6">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-50">
                        <h2>Event Schedule</h2>
                        <p> An event is not over until everyone is tired of talking about it.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="">
                                <div class="" id="accordionExample">
                                    <!-- single-one -->
                                    <div class="card" style="background: #331391;">
                                        <div class=" card-header" id="headingTwo">
                                            <h2 class="mb-0" style="color: white">
                                                <span>Date</span>
                                                <p style="color: white">
                                                    {{ date('d-m-Y', strtotime($events->event_date)) }}
                                                </p>
                                            </h2>
                                        </div>
                                    </div>
                                    <!-- single-two -->
                                    <div class="card" style="background: #331391;">
                                        <div class=" card-header" id="headingTwo">
                                            <h2 class="mb-0" style="color: white">
                                                <span>Time</span>
                                                <p style="color: white">
                                                    {{ date('h:i A', strtotime($events->start_time)) .' to ' . date('h:i A', strtotime($events->end_time))}}
                                                </p>
                                            </h2>
                                        </div>
                                    </div>
                                    <!-- single-three -->
                                    <div class="card" style="background: #331391;">
                                        <div class=" card-header" id="headingTwo">
                                            <h2 class="mb-0" style="color: white">
                                                <span>Venue</span>
                                                <p style="color: white">
                                                    {{ $events->event_address .', '. $events->event_city .', '. $events->event_state .'.' }}
                                                </p>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="card" style="background: #331391;">
                                        <div class=" card-header" id="headingTwo">
                                            <h2 class="mb-0" style="color: white">
                                                <span>Organiser</span>
                                                <p style="color: white; padding-top:10px">
                                                    {{ $events->creatable->organiser_name }}<br />
                                                    {{ $events->creatable->organiser_description }}

                                                    {{ $events->creatable->admin_name }}<br />
                                                </p>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Nav Card -->
        </div>
    </section>
    <!-- accordion End -->

    <!--? Pricing Card Start -->
    <section class="pricing-card-area section-padding2" id="price" style="padding-top: 100px; padding-bottom: 30px">
        <form action="{{ route('ticket.confirm') }}" method="post">
            @csrf
            <div class="container">
                <!-- Section Tittle -->
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="section-tittle text-center mb-100">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                    </div>
                    <input type="hidden" name="price" id="eventprice" value={{ $events->event_price }}>
                    <input type="hidden" name="id" value={{ $events->id }}>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10" style="margin-bottom: 30px;">
                        <div class="single-card active text-center mb-30">
                            <h2 style="color:white">Program Pricing</h2><br>
                            <div class="card-top">
                                <h4>Rs. {{ $events->event_price }}</h4>
                            </div>
                            <div class="card-bottom">
                                <ul>
                                    <li>Total Tickets : {{ $events->total_ticket }}</li>
                                    <li>Available Tickets : {{ $events->available_ticket }}</li>
                                    <li>Quantity : <a id="qty">1</a>
                                    </li>
                                    <li>Total Amount : <a id="amount">{{ $events->event_price }}</a></li>
                                </ul>
                                <div class="center" style="width:200px; margin:40px auto">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" id="minus" class="btn btn-danger btn-number black-btn" data-type="minus" data-field="quantity" style="height:40px; width:30px">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </span>
                                        <input type="text" name="quantity" name="quantity" id="quantity" class="form-control input-number" value="1" min="1" max="10" style="text-align:center; height:40px">
                                        <span class="input-group-btn">
                                            <button type="button" id="plus" class="btn btn-success btn-number black-btn" data-type="plus" data-field="quantity" style="height:40px; width:30px">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                {{-- Check for Event Status --}}
                                @if($events->status == 1 && $events->available_ticket > 0) 
                                    <button type="submit" class="black-btn">Book Now</button>
                                @else
                                    <button class="black-btn" disabled>Booking Closed</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- Pricing Card End -->
   </main>

<script>
    let x = setInterval(function() {
        let dest = new Date("{{ $events->event_date }}").getTime();
        let now = new Date().getTime();
        let diff = dest - now;
        // console.log(diff);
        let days = Math.floor(diff / (1000 * 60 * 60 * 24));
        let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        let second = Math.floor((diff % (1000 * 60)) / 1000);
        
        document.getElementById("day").innerHTML = days;
        document.getElementById("hour").innerHTML = hours;
        document.getElementById("min").innerHTML = minutes;
        document.getElementById("second").innerHTML = second;

        if (days <= 0 && hours <= 0 && minutes <= 0 && second <= 0) {
            eventUpdate();

            document.getElementById("day").innerHTML = 0;
            document.getElementById("hour").innerHTML = 0;
            document.getElementById("min").innerHTML = 0;
            document.getElementById("second").innerHTML = 0;
        }
    }, 1000);

    function eventUpdate() {
        clearInterval(x);
        $.ajax({
            type: "POST",
            url: 'eventupdate.php?event={{ 'Test' }}',
            data: {
                functionname: 'eventUpdate',
            },
            success: function(data) {
                console.log(data);
            }
        });
    }
</script>

    </x-slot>
</x-user-layout>