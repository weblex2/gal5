<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Houses') }}
        </h2>
    </x-slot>
    <div class="py-2 w-full">
        <div class="w-full mx-auto px-6">
            <div class="bg-white w-full overflow-hidden shadow-xl sm:rounded-lg ">
                
                <div class="grid grid-cols-12">
                    @foreach($articles as $i => $article)
                        <div class="col-span-3">
                            <img class="border border-slate-500 w-48 h-48" src="{{ Storage::disk("local")->url("shop/img/".$article->image) }}" > 
                        </div>
                        <div class="text-left col-span-9">    
                            <a href="{{route("shop.showArticle" ,['id'=>$article->id] )}} ">{{ $article->name }}</a>
                        </div>
                    @endforeach
                </div>
                @php
                    //dump ($articles);
                @endphp
            </div>
        </div>
    </div>

</x-app-layout>
