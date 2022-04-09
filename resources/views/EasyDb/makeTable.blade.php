<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EasyDb - Make Migration') }} {{strtoupper(env('DB_DATABASE')) }} / {{ strtoupper($table_name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                <div class="p-6 bg-white  border-gray-200 mb-4">
                    <div class="p-6 border">
                        Result {{$result}}
                        Output {{$output}}
                        @php $cl = $result !== 1  ? 'bg-green-400' : 'bg-red-50';  @endphp
                        @if ($result==0)
                          <div class="{{ $cl }} p-5">
                                {!!  $output !!}
                          </div>
                        @else 
                            Result {{$result}}
                            <div class="{{ $cl }} p-5">
                                {!!  $output !!}
                            </div>
                            <textarea class="w-full min-h-max " rows="20">
                                {!! $migration !!}
                            </textarea>
                       @endif
                        
                        
                    </div>
                    Result: {{ $result }}
                    <div class="text-center py-8 align-middle justify-center">
                        <a class="float-right border bg-blue-300 border-blue-800 px-6 py-2 rounded block w-48 text-center hover:bg-blue-400" href="{{ route('easydb.editTable', ['name' => $table_name]) }}">Edit</a>
                        <a class="float-left border bg-gray-50 border-grey-800 px-6 py-2 rounded block w-48 text-center hover:bg-grey-100" href="{{ route('easydb.index') }}">Back</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>

