<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('KnowledgeBase') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="bg-slate-300 w-full">
            <div class="float-left bg-gray-200 bg-opacity-25 shadow-xl sm:rounded-lg w-1/5 p-2">
                <div>Search</div>
                <form method="POST" action="{{route("kb.show")}}">
                    @csrf
                    <div>Topic:</div>
                    <div>
                        <input type="text" name="topic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                    </div>
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="float-left w-4/5">
                <div class="w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                            <div class="p-6">
                                <a href="{{route('kb.new')}}">New</a>
                                <div class="flex items-center">
                                    <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">abc</div> -->

                                    <div class="grid grid-cols-2">
                                        @foreach ($kb as $key => $row)
                                            <div><a href="{{ route("kb.detail", ['id' => $row->id] ) }}">{{$row->topic}}</a></div>
                                            <div>{{$row->description}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>