@extends('layouts.gallery')

@php
  echo \Auth::id();
  dump ($galleries);
@endphp
@section('content')
<div class="py-12 w-full h-full">
        <div class="w-4/5 mx-auto sm:px-6 lg:px-8 h-full">  
            <!--div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"-->
              @if (count($galleries)>0)
              <div id="gallery_overview" class="grid grid-cols-4 gap-8 h-full">
                  @foreach ($galleries as $gal)
                    @php
                      if ($gal->background_pic !="") {
                          $bg= Storage::url('gal/'.$gal->id."/".$gal->background_pic);
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
                        <div class="gallery_public"><i class="{{ $gal->public==1 ? 'text-green-500': 'text-orange-500' }} fa-solid fa-users"></i></div>
                      </div>
                    </a>
                  @endforeach
            </div>
            @elseif (count($galleries)>0 && \Auth::id()) {
              <div class="h-full flex justify-center items-center w-full text-center w-full ">
                <div class="shadow-2xl shadow-cyan-500/50  p-5 rounded bg-slate-700 w-fit text-orange-500 text-xl bold">
                You have no galleries yet. <a href="{{ route('gallery.new') }}">Create one!</a>
                </div>
              </div>  
            }
            @else
              <div class="h-full flex justify-center items-center w-full text-center w-full ">
                  <div class="shadow-2xl shadow-cyan-500/50  p-5 rounded bg-slate-700 w-fit text-orange-500 text-xl bold">
                  No public galleries found. Try to log on.
                  </div>
              </div>
            @endif
            <!--/div-->
    </div>
    
@endsection
    

