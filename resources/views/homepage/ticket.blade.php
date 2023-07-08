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
                <div class="page-header text-blue-d2">
                    <h1 class="page-title text-secondary-d1">
                        Payment ID
                        <small class="page-info">
                            <i class="fa fa-angle-double-right text-80"></i>
                            {{ $ticket->paymentno }}
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
                                        <span class="text-600 text-110 text-blue align-middle">{{ $ticket->event->event_name }}</span>
                                    </div>
                                    <div> <span class="text-600 text-95 align-middle">{{ $ticket->event->event_description }}</span>
                                    </div>
                                    <div class="">
                                        <div class="my-1">
                                            {{ $ticket->event->event_address }}
                                        </div>
                                        <div class="my-1">
                                            {{ $ticket->event->event_city .', '. $ticket->event->event_state . '.'}}
                                        </div>
                                    </div>
                                </div>

                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-center">
                                    <hr class="d-sm-none" />
                                    <div class="text-grey-m2">
                                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                            Ticket
                                        </div>
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Event Date :</span>{{ date(' d-m-Y', strtotime($ticket->event_date)) }}</div>
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Start Time :</span>{{ date(' h:i A', strtotime($ticket->start_time)) }}</div>
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">End Time :</span>{{ date(' h:i A', strtotime($ticket->end_time)) }}</div>
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status :</span> <span class="badge badge-success badge-pill px-25">{{ $ticket->status }}</span></div>
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
                                        <div class="col-9 col-sm-5">{{ $ticket->user->user_name }}</div>
                                        <div class="d-none d-sm-block col-2" id="qty">{{ $ticket->quantity }}</div>
                                        <div class="d-none d-sm-block col-2 text-95">{{ $ticket->event_price }}</div>
                                        <div class="col-2 text-secondary-d2" id="amount2">{{ $ticket->payment_amount }}</div>
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
                                                <span class="text-150 text-success-d3 opacity-2" id="amount" name="amount">Rs. {{ $ticket->payment_amount }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr />

                                <div>
                                    <!-- <span class="text-secondary-d1 text-105">Thank you for ticket booking.</span> -->
                                    <div class="page-header text-blue-d2">
                                        <h1 class="page-title text-secondary-d1">
                                            Thank you for ticket booking.
                                        </h1>
                                        <div class="page-tools">
                                            <div class="action-buttons">

                                                <button class="btn paybtn mx-1px text-95" onclick="window.print();" style="border: 1px solid black">
                                                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-4"></i>
                                                    Download
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>