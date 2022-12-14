<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Noppal - Gallery</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--script src="https://code.jquery.com/jquery-3.6.0.js"></script-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script src="ckeditor/ckeditor.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"-->
    <link rel="stylesheet href="public/css/fontawesome-free-6.1.1-web/css/all.css">
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    {{--  dropbox CDN  --}}
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

       <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
        </script>
        <!--script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
        </script-->

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
            integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">



</head>
<body class="gallery_body">
<div class="h-screen  flex flex-col" id="maindiv">


    <form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
            </textarea>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor 4
            // instance, using default configuration.
            CKEDITOR.replace( 'editor1' );
        </script>
    </form>

    <div class="bg-slate-800 border-b border-slate-900 pt-3  sm:block ">
        <div class="flex space-x-4 float-left">
            <!--a href="/" class="menu_item">
                home
            </a-->

            <!--a href="#" class="menu_item">
                new gallery
            </a-->
            <a href="{{ route("gallery.index") }}">
                <img src="{{ Storage::url('me.png')}}" class="rounded-full w-8 ml-3 mb-2 mt-[-5px]">
            </a>

            <span class="text-orange-500">
                @if (Auth::user())
                    {{ Auth::user()->email }}
                @else
                    nich eingelogged.
                @endif
            </span>
        </div>

        <div class="float-right flex px-3 z-20">

            @if (!Auth::user())

                <a href="{{ route("gallery.index") }}">
                    <i class="float-right mb-3 mx-2 text-white fa fa-home"></i>
                </a>

                @isset($gal_id)
                <a href="{{ route("gallery.show", ['id' => $gal_id] ) }}">
                    <i class="float-right mb-3 mx-2 text-white fa fa-arrow-up"></i>
                </a>
                @endisset

                <a href="#" onclick="$('#loginWrapper').toggle(200)">
                    <i class="float-right mb-3 mx-2 text-white fa fa-user"></i>
                </a>

                <div id="loginWrapper" class="">
                    <form METHOD="POST" action="{{ route("login") }}">
                        @csrf
                    <div class="">
                        <input type="text" name="email" class="rounded-md shadow-sm border-gray-800 block mt-1 w-full">
                    </div>
                        <div class="">
                            <input type="password" name="password" class="rounded-md shadow-sm border-gray-800 block mt-1 w-full">
                        </div>
                        <button class="btn_save mt-1 rounded-lg">Login</button>
                    </form>
                </div>
            @else
                @isset($gal_id)
                    <a href="{{ route("gallery.index") }}">
                        <i class="float-right mb-3 mx-2 text-white fa fa-home"></i>
                    </a>

                    <a href="{{ route("gallery.show", ['id' => $gal_id] ) }}">
                        <i class="float-right mb-3 mx-2 text-white fa fa-arrow-up"></i>
                    </a>
                    <a href="{{ route("gallery.edit", ['id' => $gal_id]) }}">
                        <i class="float-right mb-3 mx-2 text-white fa fa-edit"></i>
                    </a>

                    <a href="{{ route("gallery.edit", ['id' => $gal_id]) }}">
                        <i class="float-right mb-3 mx-2 text-white fa fa-play"></i>
                    </a>
                @else

                    <a href="{{ route("gallery.new") }}">
                        <i class="float-right mb-3 mx-2 text-white fa fa-plus"></i>
                    </a>

                    <a href="{{ route("gallery.index") }}">
                        <i class="float-right mb-3 mx-2 text-white fa fa-home"></i>
                    </a>

                @endisset

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="float-right mb-3 mx-2 text-white fa fa-sign-out"></i>
                    </a>
                </form>
            @endif
        </div>
    </div>



    <div class="flex flex-col h-full overflow-y-auto">

        <div class="sm-menu  absolute left-0 w-full lg:hidden">
            <div class="bg-slate-400">Menu 1</div>
            <div class="bg-slate-400">Menu 2</div>
            <div class="bg-slate-400">Menu 3</div>
        </div>
        <!-- THREE COLUMNS LAYOUT -->
        <div class="flex h-full">

            <!-- COLUMN ONE -->
            <div class="menue w-1/5  flex flex-col bg-slate-800">

                <div class="flex flex-col h-full">

                    <div class="h-full flex-grow-0 overflow-y-auto">
                        <div class="flex flex-col items-stretch">
                        @yield('options')
                        </div>
                    </div>
                </div>

            </div>
            <!-- COLUMN ONE -->

            <!-- COLUMN TWO -->
            <div class="w-4/5 bg-slate-800 border-l border-slate-900 flex flex-col h-full max-h-full overflow-auto" id="main">
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
