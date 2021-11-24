<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>UMKM Desa</title>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
</head>
<body style="font-family:Rubik, sans-serif">
    @include('components.header')
    @yield('content')
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh1KbTbvdpLUfTB-yyJHtr3ea5iZEXlwY&callback=initMap&v=weekly"
      async
    ></script>
</body>
</html>