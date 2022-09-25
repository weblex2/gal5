@extends('layouts.gallery')

@section('options')
    <a href="{{ route('gallery.edit', ['id'=>1] ) }}">Edit</a>
@endsection


@section('content')
    <div id="myPic" class="h-full max-h-full p-5  items-center justify-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-12">
            <div class="grid grid-cols-{{ $pagination }} grid-flow-col gap-3">
                @foreach ($pics as $pic)
                {{-- @php
                $fileName = 'gal/'.$gal_id."/" . $pic->file_name;
                @endphp --}}
                <div>
                    <a href="{{ route('gallery.showPic',$pic->id) }}">
                    <img class="preview_pic" src="{{ Storage::url('gal/'.$gal_id."/" . $pic->file_name) }}"></img>
                    </a>
                </div>
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



