<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <style>
        .category-card:hover{
            background-color:#E6E6FA!important;
        }
        .card-link-delete:hover{
            color:#bf4040 !important;
        }
        .accordion-button:hover {
            background-color:#AC4073 !important;
            color:white !important;
        }
        .accordion-button:not(.collapsed){
            background-color:#AC4073 !important;
            color:white !important;
        }
        .florista-card:hover {
            box-shadow: 1px 1px 13px 0 rgb(171 64 115 / 30%)!important;
            border-color: #ab407357!important;
        }
        .florista-card:hover a svg{
            color: dark;
        }
        .florista-card:hover svg{
            color: #9370DB	!important;
        }
        .florista-card:hover .card-title{
            color: #9370DB	!important;
        }
        .florista-card:hover {
            color: #ab407357!important;
        }
        .florista-card-admin:hover{
            box-shadow: 1px 1px 13px 0 rgb(171 64 115 / 30%)!important;
            border-color: #ab407357!important;
        }
        .card-link:hover{
            color: rgb(60, 60, 60)!important;
        }
        .custom-form input {
            height: 55px;
            font-family: Montserrat !important;
        }
        .btn-new{
            color:black;
        }
        .dropdown-menu {
            opacity: 1 !important;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown:hover .dropdown-menu {
            opacity: 0;
            transition: all 0.2s ease-in-out;
        }

        .dropdown:hover .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transition: all 0.2s ease-in-out;
        }
        .dropdown-item:hover, .dropdown-item:focus{
            background-color:#F9F5F3;
            color: #585858!important;
        }
        .florist-name:focus {
            border-style: none !important;
            outline: none !important;
        }
        .accordion-title:hover{
            color:white;
        }
        .collapse.show {
            visibility: visible;
        }
        #carousel-inner {
        height: 800px; /* ajusta la altura según tus necesidades */
        }
        .carousel-item img {
            height: 100%;
            width: auto;
        }
        .text {
            font-size: 14px;
            line-height: 1.5;
            padding-bottom: 5px; /* Agregar espacio adicional entre líneas */
        }
    </style>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
            <header class="shadow" style="background-color:#F9F5F3">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb m-auto">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Área privada</li>
                        </ol>
                    </nav>
                </div>
            </header>
            @endif
            <!-- Page Content -->
            <div class="d-flex justify-content-center">
                <main>
                    <div style="display: flex; justify-content: center;">
                        {{ $slot }}
                    </div>
                </main>
            </div>

        </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
    <script type="text/javascript">
        @if (session('success'))
            toastr.success('{{session('success')}}');
        @endif
        @if (session('error'))
            toastr.error('{{session('error')}}');
        @endif
        window.addEventListener('success', event => {
            toastr.success(event.detail.success);
        }) 
        window.addEventListener('error', event => {
            toastr.error(event.detail.error);
        }) 
        window.addEventListener('warning', event => {
            toastr.warning(event.detail.warning);
        }) 
        window.addEventListener('info', event => {
            toastr.info(event.detail.info);
        }) 
    </script>
</html>