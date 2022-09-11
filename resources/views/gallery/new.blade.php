<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new Gallery') }}
        </h2>
    </x-slot>
    <div class="py-12">
      
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-4 p-3">
              <form action="{{ route('gallery.create') }}" method="POST">
                <div>
                    Give your gallery a name :)  
                    <input type="hidden" name="user_id" value="{{ \Auth::id() }}"> 
                    <input class="p-1 rounded mt-3 mb-2 w-full" type="text" name="gal_name">
                    @csrf
                    <button type="submit" class="mt-3 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-1  rounded ">Create</button>
                </div> 
              </form>
            </div>  
            
        </div>
    </div>
</x-app-layout>