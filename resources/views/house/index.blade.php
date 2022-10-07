<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Houses') }}
        </h2>
    </x-slot>


    <div class="py-12 w-full">
        <div class="w-full mx-auto px-6">
            <div class="bg-white w-full overflow-hidden shadow-xl sm:rounded-lg grid grid-cols-4">
                @foreach ($houses as $house)
                        <div class="p-2">
                            <a href="{{ route('house.edit', ['id' => $house->id] ) }}">
                                {{ $house->house_number }}
                            </a>
                        </div>
                        <div class="p-2">{{ $house->detail }}</div>
                        <div class="p-2">{{ $house->created_at }}</div>
                        <div class="p-2">{{ $house->updated_at }}</div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
