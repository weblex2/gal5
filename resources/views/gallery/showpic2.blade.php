@extends('layouts.gallery')
@php         
  
  $exif = json_decode($pic->exif_data,1);
  $osm = json_decode($pic->osm_data,1);
  $picPath = Storage::url("gal/".$pic->gal_id."/".$pic->file_name);
  $gal_id = $pic->gal_id;
  if (!isset($exif['jpg'])) {
    $exif['jpg']['exif']['GPS']['computed']['latitude']="";
    $exif['jpg']['exif']['GPS']['computed']['longitude']="";
    $exif['jpg']['exif']['GPS']['computed']['altitude']="";
    $exif['jpg']['exif']['IFD0']['Make']="";
    $exif['jpg']['exif']['IFD0']['Model']="";
    $osm['address']=[];
  }
@endphp

@section('options')
    <div id="exif_data flex flex-col justify-between">
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
              @php 
                #dump($osm);
              @endphp
              @if( count($osm['address'])>0) 
                @foreach($osm['address'] as $key => $val)
                <tr><td>{{ $key }}</td><td>{{ $val }}</td></tr>
                @endforeach
              @elseif (isset($osm['place_id']) )
                <tr><td> place id </td><td>{{ $osm['place_id'] }}</td></tr>
                <tr><td> osm_type </td><td>{{ $osm['osm_type'] }}</td></tr>
                <tr><td> cat </td><td>{{ $osm['category'] }}</td></tr>
                <tr><td> type </td><td>{{ $osm['type'] }}</td></tr>
                <tr><td> address type </td><td>{{ $osm['addresstype'] }}</td></tr>
                <tr><td> name </td><td>{{ $osm['name'] }}</td></tr>
                <tr><td> display name </td><td>{{ $osm['display_name'] }}</td></tr>
              @else{
                <tr><td colspan="2"> No OSM data found.</td></tr>
              }
              @endif
            </tbody>
          </table>
        
          @php
             $lon = $exif['jpg']['exif']['GPS']['computed']['longitude'];
             $lat = $exif['jpg']['exif']['GPS']['computed']['latitude'];
          @endphp
          <div class="h-full flex flex-grow bg-slate-700 mt-10 p-3 ">  
          <iframe 
                width="100%" 
                height="200" 
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

    @php
        $diashow=false;
        $path = asset('storage/gal/'.$gal_id."/" . $pic->file_name);
        $extension = strtoupper(pathinfo($path, PATHINFO_EXTENSION));
    @endphp
    <div id="myPic" class="h-full max-h-full p-5  items-center justify-center">
    @if (in_array($extension,['JPG','JPEG','GIF','PNG']))
       <img class="mx-auto rounded-lg shadow-2xl shadow-cyan-500/50 max-h-full" src="{{$picPath}}">
    @else
       <video   controls class="mx-auto rounded-lg shadow-2xl shadow-cyan-500/50 max-h-full">
       <source src="{{ Storage::url('gal/'.$gal_id."/" . $pic->file_name) }}" type="video/mp4">
       Your browser does not support the video tag.
       </video>                 
    }
    @endif
    </div> 


    

    <script>

        function nextPic(){
            clearTimeout(myTimeout);
            if ($('#picNext').length>0) {
              $('#picNext').click();
            }
        }

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
   
   @if ($diashow)
    <script>
        var to = 70000;
        console.log('to set to ' + to);
        var myTimeout = setTimeout(nextPic(),to);
    </script>  
    @endif

@endsection