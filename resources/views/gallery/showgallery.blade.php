@extends('layouts.gallery')

@section('options')
    <div class="container_menu_header">
                menu
    </div>
@endsection


@section('content')
    <div id="myPic" class="h-full max-h-full p-5  items-center justify-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-12">
            <div class="grid grid-cols-{{ $pagination }} grid-flow-col gap-3">
                @foreach ($pics as $pic)
                @php
                    $path = asset('storage/gal/'.$gal_id."/" . $pic->file_name);
                    $extension = strtoupper(pathinfo($path, PATHINFO_EXTENSION));
                    #echo $extension;                   
                @endphp
                
                @if (in_array($extension,['JPG','JPEG','GIF','PNG']))
                    <div class="block">
                        <a href="{{ route('gallery.showPic',$pic->id) }}">
                        <img class="preview_pic" src="{{ Storage::url('gal/'.$gal_id."/" . $pic->file_name) }}"></img>
                        </a>    
                    </div>
                @else{
                    <a href="{{ route('gallery.showPic',$pic->id) }}">
                    <video  class="preview_pic">
                    <source src="{{ Storage::url('gal/'.$gal_id."/" . $pic->file_name) }}" type="video/mp4">
                    Your browser does not support the video tag.
                    </video>
                    </a>
                @endif
            @endforeach
             
            </div>   
            <div class="flex">
                {{ $pics->links() }}
            </div> 
        </div>
    </div>
    <script>
        $(function() {
            var h = $('#myPic').outerHeight();
            var cl = "h-["+ h +"]";
            $('#myPic').addClass(cl);
        });
    </script>
@endsection



