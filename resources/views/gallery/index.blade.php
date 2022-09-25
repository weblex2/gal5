@extends('layouts.gallery')

@section('content')
<div class="py-12 w-full">
        <div class="w-4/5 mx-auto sm:px-6 lg:px-8">  
            <!--div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"-->
              <div id="gallery_overview" class="grid grid-cols-4 gap-4">
              @foreach ($galleries as $gal)
                <a href="{{ route('gallery.show',$gal->id) }}">
                  <div class="h-48">{{ $gal->gal_name }}</div>
                </a>
              @endforeach
            </div>
            <!--/div-->
    </div>
@endsection
    

