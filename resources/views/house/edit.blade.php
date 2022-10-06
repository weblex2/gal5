<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit House') }}  {{ $house->id }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="w-full mx-auto px-6">
            <div class="bg-white p-3 w-full overflow-hidden shadow-xl sm:rounded-lg">
                @if ($message = Session::get('success'))
                    <div class="flex alert alert-success items-center">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @include('house.frmHouse')
            </div>
        </div>
    </div>

</x-app-layout>
