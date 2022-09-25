@extends('layouts.gallery')
@php          
  $exif = json_decode($pic->exif_data,1);
  $osm = json_decode($pic->osm_data,1);
  $picPath = Storage::url("gal/".$pic->gal_id."/".$pic->file_name);
@endphp

@section('options')
    <a href="{{ route('gallery.edit', ['id'=>1] ) }}">Edit</a>
@endsection

@section('content')
    <div id="myPic" class="h-full max-h-full p-5  items-center justify-center">
        <img class="mx-auto rounded-lg shadow-2xl shadow-cyan-500/50 max-h-full" src="{{$picPath}}">
    </div>
    <script>
        $(function() {
            var h = $('#myPic').outerHeight();
            var cl = "h-["+ h +"]";
            $('#myPic').addClass(cl);
        });
    </script>
@endsection