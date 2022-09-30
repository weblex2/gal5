<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('KnowledgeBase Detail') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="bg-slate-300 w-full px-3  ">
             @include("kb.search")
            <div class="float-left w-4/5">
                <div class="w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="bg-gray-200 bg-opacity-25 ">
                            <div class="p-6 w-full">
                                <div class="w-full block  text-right">
                                    <a class="px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition " href="{{route('kb.edit', ['id' => $kb->id])}}">Edit</a>

                                <a class="px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition " href="{{route('kb.new')}}">New</a>
                                </div>
                                <div class="detail_div w-full">
                                    {!! $kb->body !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
