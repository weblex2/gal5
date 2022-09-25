@extends('layouts.gallery')
@php          
  $exif = json_decode($pic->exif_data,1);
  $osm = json_decode($pic->osm_data,1);
  $picPath = Storage::url("gal/".$pic->gal_id."/".$pic->file_name);
@endphp

@section('options')
    <div id="exif_data flex items-stretch">
    <table class="tblExif">
            <thead>
              <tr><th colspan="2">Exif Data</th></tr>  
            </thead>
            <tbody>
              <tr><td>filename</td><td>{{ $exif['filename'] }}</td></tr>
              <tr><td>format</td><td>{{ $exif['fileformat'] }}</td></tr>
              <tr><td>width</td><td>{{ $exif['video']['resolution_x']}}</td></tr>
              <tr><td>height</td><td>{{ $exif['video']['resolution_y']}}</td></tr>
              <tr><td>latitude</td><td>{{ $exif['jpg']['exif']['GPS']['computed']['latitude'] }}</td></tr>
              <tr><td>longitude</td><td>{{ $exif['jpg']['exif']['GPS']['computed']['longitude'] }}</td></tr>
              <tr><td>altitude</td><td>{{ $exif['jpg']['exif']['GPS']['computed']['altitude'] }}</td></tr>
              <tr><td>make</td><td>{{ $exif['jpg']['exif']['IFD0']['Make'] }}</td></tr>
              <tr><td>model</td><td>{{ $exif['jpg']['exif']['IFD0']['Model'] }}</td></tr>
              <tr><td colspan="2">&nbsp;</td>  
              <tr><th colspan="2">Open Street Map Data</th></tr>
              @foreach($osm['address'] as $key => $val)
              <tr><td>{{ $key }}</td><td>{{ $val }}</td></tr>
              @endforeach
            </tbody>
          </table>
        
          @php
             $lon = $exif['jpg']['exif']['GPS']['computed']['longitude'];
             $lat = $exif['jpg']['exif']['GPS']['computed']['latitude'];
          @endphp
          <div class="bottom-0">  
          <iframe 
                width="100%" 
                height="240" 
                bottom="0"
                frameborder="0" 
                scrolling="no" 
                marginheight="0" 
                marginwidth="0" 
                src="https://maps.google.com/maps?q={{$lat}},{{$lon}}&hl=de&z=14&amp;output=embed"
           >
           </iframe>
           </div>
    </div>
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