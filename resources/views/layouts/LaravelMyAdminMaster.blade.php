<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"-->
    <link rel="stylesheet href="public/css/fontawesome-free-6.1.1-web/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="h-screen  flex flex-col" id="maindiv">
    <div class="bg-slate-800 py-8 hidden sm:block ">
        <div class="flex space-x-4">
            <a href="#" class="bg-orange-900 text-white
                        px-3 py-2 rounded-md text-sm
                        font-medium" aria-current="page">
                Button
            </a>

            <a href="#" class="text-orange-500
                        hover:bg-gray-700
                        hover:text-white px-3 py-2
                        rounded-md text-sm font-medium">
                Team
            </a>

            <a href="#" class="text-gray-300
                        hover:bg-gray-700
                        hover:text-white px-3 py-2
                        rounded-md text-sm font-medium">
                Projects
            </a>

            <a href="#" class="text-gray-300
                        hover:bg-gray-700 hover:text-white
                        px-3 py-2 rounded-md
                        text-sm font-medium">
                Calendar
            </a>
        </div>
    </div>
    <div class="flex flex-col h-full overflow-y-auto">
        <!-- THREE COLUMNS LAYOUT -->
        <div class="flex h-full">

            <!-- COLUMN ONE -->
            <div class="w-1/5  flex flex-col bg-slate-400">

                <div class="flex flex-col h-full">

                    <div class="h-full flex-grow-0 overflow-y-auto p-3">
                        <div class="flex flex-col">
                            <x-laravel-my-admin.db-list :dbName="$dbName"/>
                        </div>
                    </div>

                    <!--div class="bg-red-200 h-32 flex-none">
                        This will always be fixed height
                    </div>

                    <div class="bg-red-300 h-20 flex-none">
                        This will always be fixed height
                    </div-->

                </div>

            </div>
            <!-- COLUMN ONE -->

            <!-- COLUMN TWO -->
            <div class="w-4/5 bg-slate-300 flex flex-col h-full overflow-y-auto" id="main">MIDDLE</div>
            <!-- COLUMN TWO -->

        </div>
        <!-- THREE COLUMNS LAYOUT -->
    </div>
    <div class="bg-slate-500 p-5 text-slate-200 ">
        The Footer should always be visible

        <i class="fa fa-save"></i>
        <i class="fa fa-trash"></i>
        <i class="fa fa-home"></i>
    </div>
</div>

</body>
</html>
