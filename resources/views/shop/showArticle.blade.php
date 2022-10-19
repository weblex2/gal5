<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Houses') }}
        </h2>
    </x-slot>
    <div class="py-2 w-full">
        <div class="w-full mx-auto px-6">
            <div class="bg-white w-full overflow-hidden shadow-xl sm:rounded-lg ">
                
                    Detail
                {{$article->id}}    
            </div>
        </div>
    </div>
    <a href="{{ route('make.payment') }}" class="btn btn-primary mt-3">Pay $224 via Paypal</a>
</x-app-layout>
