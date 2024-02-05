<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Rafael Franchini
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    {{-- <link href="../assets/css/nucleo-icons.css" rel="stylesheet" /> --}}
    {{-- <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    {{-- <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url('/assets/css/material-dashboard.css') }}" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead

</head>

<body class="g-sidenav-show bg-gray-100">

    @inertia

    <!--   Core JS Files   -->
    <script src="{{ url('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- Plugin for the charts, full documentation here: https://www.chartjs.org/ -->
    {{-- <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script src="../assets/js/plugins/Chart.extension.js"></script> --}}

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('/assets/js/material-dashboard.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
