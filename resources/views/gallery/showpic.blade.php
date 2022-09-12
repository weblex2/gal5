<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Pic') }}
        </h2>
    </x-slot>
    <div class="container_menu  flex flex-grow items-left bg-slate-700">
      <div class="w-full">
      <div class="menu_header">menu</div>
      <div><a class="btn_edit" href="{{ route("gallery.edit" , [$pic->gal_id]) }}">Edit</a></div>
      </div>
    </div>
    <div class="container_pictures flex justify-center items-center flex-grow bg-slate-200">

      <div class="pic_container flex">
            @php
              echo "hallo ". Storage::url("public/app/gal/".$pic->gal_id."/".$pic->file_name);
            @endphp 
            <img class="the_pic object-contain" src="{{ Storage::url("gal/".$pic->gal_id."/".$pic->file_name) }}"></img>
      </div>  
    </div>  
</x-app-layout>