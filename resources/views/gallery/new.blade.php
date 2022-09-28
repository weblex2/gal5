@extends('layouts.gallery')
@section('options')
    <div class="container_menu_header">
                menu
    </div>
@endsection

@section('content')
<div class="container_pictures w-full flex justify-center  flex-grow">
              <form action="{{ route('gallery.create') }}" method="POST">
                <div>
                    <h2 class="text-slate-500">Give your gallery a name :)  </h2>
                    <input type="hidden" name="create_user_id" value="{{ \Auth::id() }}"> 
                    <input class="p-1 rounded mt-3 mb-2 w-full" type="text" name="gal_name">
                    @csrf
                    <button type="submit" class="btn_save">Create</button>
                </div> 
              </form>
</div>              
@endsection