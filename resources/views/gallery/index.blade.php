@extends('layouts.gallery')

@section('content')
<div class="py-12 w-full">
        <div class="w-4/5 mx-auto sm:px-6 lg:px-8">  
            <!--div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"-->
              <div id="gallery_overview" class="grid grid-cols-4 gap-8">
              @foreach ($galleries as $gal)
                @php
                  if ($gal->background_pic !="") {
                      $bg= Storage::url('gal/1/2022_07_29_IMG_1789.jpg');
                  } 
                  else{
                    $bg  = Storage::url('gal/default_bg.jpg');
                  }
                @endphp  
                <a href="{{ route('gallery.show',$gal->id) }}">
                  <div class="gallery_overview_item" style="background-image:url({{ $bg }})">
                    <div class="gallery_name">
                    {{ $gal->gal_name }}
                    </div>
                    <div class="gallery_public"><i class="fa-solid fa-users"></i></div>
                  </div>
                </a>
              @endforeach
            </div>
            <!--/div-->
    </div>
@endsection
    

