<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Payment Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/ticket.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main2">
        <div class="page-content container main">

            <form action="{{ route('ticket.store') }}" method="post">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="price" value="{{ $price }}">
                <input type="hidden" name="quantity" value="{{ $quantity }}">
                <input type="hidden" name="paymentno" value="{{ $paymentno }}">
                <input type="hidden" name="amount" value="{{ $amount }}">
    
                <div class="page-header text-blue-d2">
                    <h1 class="page-title text-secondary-d1">
                        Payment ID
                        <small class="page-info">
                            <i class="fa fa-angle-double-right text-80"></i>
                            {{ $paymentno }}
                        </small>
                    </h1>
                </div>
                <div class="container px-0">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center text-150">
                                        <a href="{{ route('home') }}"><img src="{{ asset('homepage/assets/img/logo/logo.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>

                            <hr class="row brc-default-l1 mx-n1 mb-4" />
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mt-1 mb-2 text-grey-m2 text-secondary-m1 text-600 text-125">
                                        Event Details
                                    </div>
                                    <div>
                                        <span class="text-600 text-110 text-blue align-middle">{{ $event->event_name }}</span>
                                    </div>
                                    <div> <span class="text-600 text-95 align-middle">{{ $event->event_description }}</span>
                                    </div>
                                    <div class="">
                                        <div class="my-1">
                                            {{ $event->event_address }}
                                        </div>
                                        <div class="my-1">
                                            {{ $event->event_city .', '. $event->event_state . '.'}}
                                        </div>
                                    </div>
                                </div>

                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-center">
                                    <hr class="d-sm-none" />
                                    <div class="text-grey-m2">
                                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                            Ticket
                                        </div>
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Event Date :</span>{{ date(' d-m-Y', strtotime($event->event_date)) }}</div>
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Start Time :</span>{{ date(' h:i A', strtotime($event->start_time)) }}</div>
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">End Time :</span>{{ date(' h:i A', strtotime($event->end_time)) }}</div>
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status :</span> <span class="badge badge-warning badge-pill px-25">Pending</span></div>
                                    </div>
                                </div>

                            </div>
                            <div class="mt-4">
                                <div class="row text-600 text-white  py-25" style="background-color: #331391;">
                                    <div class="d-none d-sm-block col-1">#</div>
                                    <div class="col-9 col-sm-5">User Name</div>
                                    <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                                    <div class="d-none d-sm-block col-sm-2">Price</div>
                                    <div class="col-2">Amount</div>
                                </div>
                                <div class="text-95 text-secondary-d3 ">
                                    <div class="row mb-2 mb-sm-0 py-25">
                                        <div class="d-none d-sm-block col-1">1</div>
                                        <div class="col-9 col-sm-5">{{ $user->name }}</div>
                                        <div class="d-none d-sm-block col-2" id="qty">{{ $quantity }}</div>
                                        <div class="d-none d-sm-block col-2 text-95">{{ $price }}</div>
                                        <div class="col-2 text-secondary-d2" id="amount2">{{ $amount }}</div>
                                    </div>
                                </div>
                                <div class="row border-b-2 brc-default-l2"></div>

                                <div class="row mt-3">
                                    <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                        <!-- some extra information -->
                                    </div>
                                    <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                        <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                            <div class="col-7 text-right">
                                                Total Amount
                                            </div>
                                            <div class="col-5">
                                                <span class="text-150 text-success-d3 opacity-2" id="amount" name="amount">Rs. {{ $amount }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr />

                                <div>
                                    <!-- <span class="text-secondary-d1 text-105">Thank you for ticket booking.</span> -->
                                    <div class="page-header text-blue-d2">
                                        <h1 class="page-title text-secondary-d1">
                                            Click on this button to pay the amount.
                                        </h1>
                                        <div class="page-tools">
                                            <div class="action-buttons">
                                                <button class="btn btn-success paybtn mx-1px text-95" type="submit">
                                                    <i class="fa fa-cart-arrow-down"></i>
                                                    <span style="padding-left: 10px;">Pay Now</span>
                                                    {{-- Stripe Payment Script --}}
                                                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ 'pk_test_51MtVzYCKX69PtaqzW8Vw1GXYpdo4tGoOhLsaetwoOj1LBiXAQIVhRT0D3mcOuT3pjg1U6zwtlIiyMwFAbuopbdgo007iYRIycs' }}" data-name="{{ $event->event_name }}" data-description="Payment ID : {{ $paymentno }}" data-amount="{{ $amount * 100 }}" data-currency="inr" data-email="{{ $user->user_email }}" data-image="{{ asset('homepage/assets/img/logo/loder.png') }}" >
                                                    </script> 
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>