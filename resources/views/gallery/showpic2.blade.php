@extends('layouts.gallery')
@php          
  $exif = json_decode($pic->exif_data,1);
  $osm = json_decode($pic->osm_data,1);
  $picPath = Storage::url("gal/".$pic->gal_id."/".$pic->file_name);
@endphp

@section('options')
    <div class="container_menu_header">
        menu
    </div>
    <a href="{{ route('gallery.edit', ['id'=>1] ) }}">Edit</a>
@endsection

@section('content')
    @if ($prev!=null)
    <a href="{{ route("gallery.showPic", ['id' => $prev]) }}" >
        <div id="picPrev" class="absolute bg-green-500 bg-opacity-0"></div>
    </a>
    @endif
    @if ($next!=null)
    <a href="{{ route("gallery.showPic", ['id' => $next]) }}" >
        <div id="picNext" class="absolute bg-green-500 bg-opacity-0"></div>
    </a>
    @endif
    <div id="myPic" class="h-full max-h-full p-5  items-center justify-center">
        <img class="mx-auto rounded-lg shadow-2xl shadow-cyan-500/50 max-h-full" src="{{$picPath}}">
    </div>
    
    <script>
        $(function() {
            var h = $('#myPic').outerHeight();
            var cl = "h-["+ h +"]";
            var w  = $('#myPic').outerWidth() / 3;
            $('#myPic').addClass(cl);

            $('#picPrev').css('height', $('#myPic').outerHeight());
            $('#picPrev').css('top', $('#myPic').offset().top)
            $('#picPrev').css('width', w);
            $('#picNext').css('height', $('#myPic').outerHeight());
            $('#picNext').css('top', $('#myPic').offset().top)
            $('#picNext').css('width', w);
            $('#picNext').css('right', '0px');
        });
    </script>
@endsection