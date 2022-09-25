@php          
  $exif = json_decode($pic->exif_data,1);
  $osm = json_decode($pic->osm_data,1);
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Pic') }}
        </h2>
    </x-slot>
    <div class="container_menu  flex flex-grow items-left bg-slate-700">
      <div class="w-full">
      <div class="menu_header">menu</div>
        <!--div><a class="btn_edit" href="{{ route("gallery.edit" , [$pic->gal_id]) }}">Edit</a></div-->
        <div class="text-orange-500">
          <table class="tblExif">
            <thead>
              <tr><th colspan="2">exif</th></tr>  
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
          
              <tr><th colspan="2">Open Street Map Data</th></tr>
              @foreach($osm['address'] as $key => $val)
              <tr><td>{{ $key }}</td><td>{{ $val }}</td></tr>
              @endforeach
            </tbody>
          </table>
       <!--  <pre>
          
          @php
            print_r($osm);  
            print_r($exif);  
          @endphp

          
          </pre>  --> 
        </div>  
      </div>
    </div>

    <div class="container_pictures max-h-full justify-center  bg-slate-500  mx-auto">
    <div class="bg-gray-500 flex flex-col max-h-full h-full ">
      <div class="flex-1 w-full  mx-auto  text-lg max-h-full h-full shadow-lg bg-gray-300">
        <img class="object-fit  w-4/5 h-auto" src="{{ Storage::url("gal/".$pic->gal_id."/".$pic->file_name) }}" alt="" />
      </div>
    </div>
    </div>

    {{-- <div class="container_pictures max-h-full justify-center  bg-slate-200 p-3 mx-auto">
      {{-- <div class="w-full rounded lg:w-full lg:h-full md:w-1/2 bg-orange-300">
        <img class="object-cover w-full h-96" src="{{ Storage::url("gal/".$pic->gal_id."/".$pic->file_name) }}" alt="" />
      </div> 
      
        <div class="flex-1 w-2/3 mx-auto text-lg bg-white h-full shadow-lg bg-gray-300">
          <img class="" src="{{ Storage::url("gal/".$pic->gal_id."/".$pic->file_name) }}" alt="" />
        </div>
    </div> --}}

      
</x-app-layout>

<script>
        $(function() {
            var h = $('.container_pictures').outerHeight();
            var cl = "h-["+ h +"]";
            $('.container_pictures').addClass(cl);
            alert(h);
        });
</script>