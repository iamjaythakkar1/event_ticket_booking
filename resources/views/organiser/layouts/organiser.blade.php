<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/css/spur.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="{{ asset("dashboard/js/chart-js-config.js") }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="{{ asset("homepage/images/icons/favicon.ico")}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("homepage/css/util.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("homepage/css/main.css") }}">
    <title>{{ $title }}</title>
</head>
<body>
    @include('organiser.sidebar')
    
    {{ $main }}

    <script src="{{ asset("homepage/vendor/jquery/jquery-3.2.1.min.js") }}"></script>
    <script src="{{ asset("homepage/vendor/animsition/js/animsition.min.js") }}"></script>
    <script src="{{ asset("homepage/vendor/bootstrap/js/popper.js") }}"></script>
    <script src="{{ asset("homepage/vendor/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("homepage/vendor/select2/select2.min.js") }}"></script>
    <script src="{{ asset("homepage/vendor/daterangepicker/moment.min.js") }}"></script>
    <script src="{{ asset("homepage/vendor/daterangepicker/daterangepicker.js") }}"></script>
    <script src="{{ asset("homepage/vendor/countdowntime/countdowntime.js") }}"></script>
    <script src="{{ asset("homepage/js/main.js") }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/js/spur.js')}}"></script>
</body>
</html>