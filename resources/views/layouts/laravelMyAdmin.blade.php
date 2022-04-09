<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    </head>
    <body class="font-sans antialiased block" style="font-family: 'Montserrat', sans-serif;">
        <div class="min-h-screen h-screen bg-grey-100">
        
            <!-- Page Content -->
            <header class="w-full bg-slate-200 h-1/6 border">
                header
            </header>    
            <sidebar class="float-left bg-slate-100 w-1/5 h-5/6">
               
                @if(!isset($dbName))
                    $dbName="xxxxxxx1";
                @endif
                Selected DB (From Layout)  = {{ $dbName }}
                
                <x-laravel-my-admin.db-list :dbName="$dbName"/>
            </sidebar>    
            <main class="float-left bg-slate-50 w-4/5 h-5/6">
                 @yield('content') 
            </main>
        </div>

        @stack('modals')
    </body>
</html>
