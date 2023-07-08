<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title }}</title>

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('homepage/assets/img/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://eventright.saasmonks.in/frontend/css/ionicons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://eventright.saasmonks.in/frontend/css/animate.min.css" rel="stylesheet">
    <link href="https://eventright.saasmonks.in/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://eventright.saasmonks.in/frontend/css/owl.carousel.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Template Main CSS File -->
    <link href="https://eventright.saasmonks.in/frontend/css/style.css" rel="stylesheet">
    <link href="https://eventright.saasmonks.in/frontend/css/custom.css" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/assets/css/style.css') }}">
    <link rel="stylesheet" href="alertify.core.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- ionicons scripts -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .introbtn {
            font-family: "Sarabun", sans-serif;
            font-size: 14px;
            font-weight: 400;
            border: 2px solid #331391;
            background: #331391;
        }
    </style>
</head>

<body>
    <style>
        :root {
            --primary_color: #313131;
            --light_primary_color: #313131;
            --profile_primary_color: #313131;
            --middle_light_primary_color: #313131;
        }
    </style>
    
        <!-- Header Start -->
        @include('homepage.header')
        <!-- Header End -->

    {{ $main }}

    <!-- Footer Starts  -->
    @include('homepage.footer')
    <!-- Footer Ends -->
    <a href="#" class="back-to-top" style="background:#331391"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://eventright.saasmonks.in/frontend/js/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/jquery.easing.min.js"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/owl.carousel.min.js"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/scrollreveal.min.js"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/map.js"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script src="https://www.paypal.com/sdk/js?client-id=AY8AEr0kVPWZiN6fCDNWf8RhWeLhzjStJs3lSz1FrN1Sx62-j5HTP1zDiTzfmL7EkAdcP2HZkoBkEeNh&currency=INR" data-namespace="paypal_sdk"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initAutocomplete&libraries=places" async defer></script>
    <script src="https://eventright.saasmonks.in/frontend/js/main.js"></script>
    <script src="https://eventright.saasmonks.in/frontend/js/custom.js"></script>

    <!-- JS here -->
    <script src="{{ asset('homepage/assets/js/javascript.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('homepage/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/bootstrap.min.js') }}"></script>

    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('homepage/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('homepage/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/slick.min.js') }}"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('homepage/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('homepage/assets/js/gijgo.min.js') }}"></script>

    <!-- Nice-select, sticky -->
    <script src="{{ asset('homepage/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/jquery.sticky.js') }}"></script>

    <!-- counter , waypoint -->
    <script src="{{ asset('homepage/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/jquery.countdown.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('homepage/assets/js/contact.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('homepage/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('homepage/assets/js/main.js') }}"></script>
</body>

</html>