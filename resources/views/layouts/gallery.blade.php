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
    <!--script src="https://code.jquery.com/jquery-3.6.0.js"></script-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"-->
    <link rel="stylesheet href="public/css/fontawesome-free-6.1.1-web/css/all.css">
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="h-screen  flex flex-col" id="maindiv">
    <div class="bg-slate-800   border-b border-slate-900 pt-3  hidden sm:block ">
        <div class="flex space-x-4 float-left">
            <a href="/" class="text-gray-300
                        hover:bg-gray-700
                        hover:text-white px-3 py-2
                        rounded-md text-sm font-medium">
                home
            </a>

            <a href="#" class="text-gray-300
                        hover:bg-gray-700 hover:text-white
                        px-3 py-2 rounded-md
                        text-sm font-medium">
                new gallery
            </a>
        </div>
        <div class="float-right px-5 z-20">
            @php
                #dump (Auth::User());
            @endphp

            @if (!Auth::user())
            <a href="#" onclick="$('#loginWrapper').toggle(200)">
                <i class="mb-3 text-white fa fa-user"></i>
            </a>
            <div id="loginWrapper" class="hidden absolute p-3 w-48 h-48 mx-5 right-0 mt-3 border border-slate-900 z-20">
                <form METHOD="POST" action="{{ route("login") }}">
                    @csrf
                <div class="">
                    <input type="text" name="email" class="rounded-md shadow-sm border-gray-800 block mt-1 w-full">
                </div>
                    <div class="">
                        <input type="password" name="password" class="rounded-md shadow-sm border-gray-800 block mt-1 w-full">
                    </div>
                    <button class="">Login</button>
                </form>
            </div>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="mb-3 text-white fa fa-sign-out"></i>
                    </a>
                </form>
            @endif
        </div>
    </div>
    <div class="flex flex-col h-full overflow-y-auto">
        <!-- THREE COLUMNS LAYOUT -->
        <div class="flex h-full">

            <!-- COLUMN ONE -->
            <div class="w-1/5  flex flex-col bg-slate-800">

                <div class="flex flex-col h-full">

                    <div class="h-full flex-grow-0 overflow-y-auto p-3">
                        <div class="flex flex-col">
                        @yield('options')
                        </div>
                    </div>
                </div>

            </div>
            <!-- COLUMN ONE -->

            <!-- COLUMN TWO -->
            <div class="w-4/5 bg-slate-800 border-l border-slate-900 flex flex-col h-full max-h-full overflow-none" id="main">
                @yield('content')
            </div>
            <!-- COLUMN TWO -->

        </div>
        <!-- THREE COLUMNS LAYOUT -->
    </div>
    <!--div class="bg-slate-500 p-5 text-slate-200 ">
        The Footer should always be visible

        <i class="fa fa-save"></i>
        <i class="fa fa-trash"></i>
        <i class="fa fa-home"></i>
    </div-->
</div>

<script>

    $(function (){

    })
</script>

</body>
</html>
