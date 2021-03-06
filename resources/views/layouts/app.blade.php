<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'MartKH DashBoard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('uploads') }}/logo/{{$logo}}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('css') }}/all.css" rel="stylesheet">
        <link media="screen" type="text/css" href="{{ asset('argon') }}/css/colorpicker.css" rel="stylesheet">
        {{-- <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet"> --}}
        {{-- Dropzone  --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"> --}}
        {{-- jquery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        {{-- <script src="{{ asset('argon')}}/js/jquery-inline-svg.min.js"></script> --}}
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <style>

        </style>
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @if(auth()->user()->role != 'franchise')
                @include('/../layouts.navbars.sidebar')
            @else
                @include('/../franchise.sidebar')
            @endif
        @endauth

        <div class="main-content" id="main-content-collapse">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest



        {{-- <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script> --}}
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('argon')}}/js/jquery.form.js"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <script src="{{ asset('argon')}}/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
        <script src="{{ asset('argon')}}/js/colorpicker.js"></script>
        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

        @include('sweetalert::alert')

        <script>
            function closeNav() {
                element = document.getElementById('sidenav-main'),
                style = window.getComputedStyle(element).getPropertyValue("max-width");
                console.log(style);
                if(style=='300px'){
                    document.getElementById("sidenav-main").style.display = "none";
                    document.getElementById("sidenav-main").style.maxWidth  = "0";
                    document.getElementById("main-content-collapse").style.marginLeft= "0";
                    Cookies.set("collapseOpen","false");
                }
                else{
                    document.getElementById("sidenav-main").style.display = "block";
                    document.getElementById("sidenav-main").style.maxWidth = "300px";
                    document.getElementById("main-content-collapse").style.marginLeft= "300px";
                    Cookies.set("collapseOpen","true");
                }
            }
            $(document).ready(function(){
                var collapseState = Cookies.get("collapseOpen");
                console.log(collapseState);
                if (collapseState == true || collapseState == "true"){
                    // closeNav();
                }
                else{
                    closeNav();
                    // element = document.getElementById('sidenav-main'),
                    // style = window.getComputedStyle(element).getPropertyValue("max-width");
                    // document.getElementById("sidenav-main").style.display = "none";
                    // document.getElementById("sidenav-main").style.maxWidth  = "0";
                    // document.getElementById("main-content-collapse").style.marginLeft= "0";
                    // document.getElementById("main-content-collapse").style.transition= "unset";
                    // Cookies.set("collapseOpen","false");
                }
            });
        </script>
    </body>
</html>

<script>
    // $('[data-inline-svg]').inlineSvg();
    // $('img.svg').each(function(){
    //         var $img = jQuery(this);
    //         var imgID = $img.attr('id');
    //         var imgClass = $img.attr('class');
    //         var imgURL = $img.attr('src');

    //         jQuery.get(imgURL, function(data) {
    //             // Get the SVG tag, ignore the rest
    //             var $svg = jQuery(data).find('svg');

    //             // Add replaced image's ID to the new SVG
    //             if(typeof imgID !== 'undefined') {
    //                 $svg = $svg.attr('id', imgID);
    //             }
    //             // Add replaced image's classes to the new SVG
    //             if(typeof imgClass !== 'undefined') {
    //                 $svg = $svg.attr('class', imgClass+' replaced-svg');
    //             }

    //             // Remove any invalid XML tags as per http://validator.w3.org
    //             $svg = $svg.removeAttr('xmlns:a');

    //             // Replace image with new SVG
    //             $img.replaceWith($svg);

    //         }, 'xml');

    //     });
</script>
