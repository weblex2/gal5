<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ mix('js/jquery360.js') }}"></script>
        <script src="{{ mix('js/jquery-ui.js') }}"></script>




        {{--  dropbox CDN  
       <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
        --}}

       <!-- Font Awesome JS -->
        <script defer src="{{asset('js/solid.js')}}"></script>
        <script defer src="{{asset('fontawesome.js' }}"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
        </script>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="mix{{"css/bootstrap.min.css"}}"
            integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/js/locales/bootstrap-datepicker.it.js"></script>
        <script src="/jquery/jquery.ui.datepicker-it.js" type="text/javascript"></script>

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="flex flex-col h-screen">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-2 lg:py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex flex-grow">
                 {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
