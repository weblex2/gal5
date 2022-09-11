<x-app-layout>
    @php
      
     #print_r($galleries);
    @endphp
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>
    <div class="py-12 w-full">
        <div class="w-4/5 mx-auto sm:px-6 lg:px-8">
             
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  @foreach ($errors as $error)
                    <div class="sm:rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                           <li>{{ $error }}</li>
                        </ul>
                    </div>
                  @endforeach   
                
                <div class="flex flex-col">
                  
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden p-2">
                          
                          <div id="gallery_overview" class="grid grid-cols-4 gap-4">
                            @foreach ($galleries as $gal)
                            <a href="{{ route('gallery.show',$gal->id) }}">
                            <div>{{ $gal->gal_name }}</div>
                            </a>
                            @endforeach
                          </div>                        
                        </div>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
    </div>
</x-app-layout>
