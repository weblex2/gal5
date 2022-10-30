<x-app-layout>
    <div class="py-2 w-full">
        <div class="w-11/12 mx-auto px-6">
            <div class="bg-white w-full overflow-hidden shadow-xl sm:rounded-lg ">
                
                <div class="grid grid-cols-12 gap-3">
                    @foreach($articles as $i => $article)
                        <div class="col-span-2 m-2 ">
                            <a href="{{route("shop.showArticle" ,['id'=>$article->id] )}} ">
                            <img class="p-2 border boder-slate-200 w-48 h-48 rounded" src="{{ Storage::disk("local")->url("shop/img/".$article->image) }}" > 
                            </a>
                        </div>
                        <div class="text-left col-span-10 pt-3 break-words">    
                            <a class="break-words" href="{{route("shop.showArticle" ,['id'=>$article->id] )}} ">
                                <div>{{ $article->name }}</div>
                            </a>    
                            <div>{{ $article->description }}</div>
                            <div class="">
                                <i class="fa fa-star text-yellow-600"></i>
                                <i class="fa-regular fa-star text-yellow-600"></i>
                            </div>
                            <div class="text-green-600 font-bold">899.99 €</div>
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
