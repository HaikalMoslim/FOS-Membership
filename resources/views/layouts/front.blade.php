<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Your custom styles -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Owl Carousel styles -->
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Font Awesome (if needed) -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous"> -->
    
    <style>
        a {
            text-decoration: none !important;
        }
    </style>

</head>
<body>

@include('layouts.inc.frontnavbar')

<div class="content">
    @yield('content')
</div>

<script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
<!-- <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script> -->
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script src="{{ asset('frontend/js/checkout.js') }}"></script>

<!-- Start of Tawk.to Script -->
<!-- Uncomment the following script if you want to use Tawk.to -->
<!--
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/656699a31db16644c5559b67/1hgccga0g';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
-->
<!-- End of Tawk.to Script -->

    <script>
        var botmanWidget = {
            title: "F.O.S ChatBot",
            aboutText: 'Start the conversation with Hi',
            introMessage: "Welcome to F.O.S, you may ask for your personal preferences by typing 'Preferences' or if you have any question, you can ask our operater by typing 'Question'",
            bubbleBackground: '#ff0000', // Red color for the chat bubble
            mainColor: '#ff0000' // Red color for the header
        };
    </script>
   
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    var availableTags = [];
    $.ajax({
        method: "GET",
        url: "/product-list",
        success: function (response) {
            startAutoComplete(response)
        }
    });

    function startAutoComplete(availableTags) {
        $("#search_product").autocomplete({
            source: availableTags
        });
    }
</script>
    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
    <script>
        swal("{{session('status')}}");
    </script>
@endif

@yield('scripts')

</body>
</html>
