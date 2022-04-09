<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EasyDb - ') }} {{strtoupper(env('DB_DATABASE')) }} / {{ strtoupper($name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  border-gray-200 mb-4">
                    <table id="tblColDetails" class="w-full bg-blue-400 rounded">
                        <th class="border px-2 py-4">Column Name</th>
                        <th class="border p-2">Null</th>
                        <th class="border p-2">Data Type</th>
                        <th class="border p-2">Length</th>
                        <th class="border p-2">Precision</th>
                        <th class="border p-2">Signed</th>
                        <th class="border p-2">Default</th>
                        <th class="border p-2">Key</th>
                        @foreach ($data as $i => $row)
                            @php $class = $i % 2 !== 0 ? 'bg-white' : 'bg-gray-50'; @endphp
                            <tr  class="{{ $class }} border-b transition duration-300 ease-in-out hover:bg-yellow-100 border-yellow-900">
                                <td class="border p-2">{{ $row['Field'] }}</td>
                                <td class="border p-2"><input disabled type="checkbox" {{  ($row['Null'] == 'YES' ? ' checked' : '') }}></td>
                                <td class="border p-2"> {{$row['datatype']}}</td>
                                <td class="border p-2 text-right">{{ $row['datalength'] }}</td>
                                <td class="border p-2 text-right">{{ $row['data_precision'] }}</td>
                                <td class="border p-2 text-right">{{ $row['signed'] }}</td>
                                <td class="border p-2">{{ $row['Default'] }}</td>
                                <td class="border p-2"> {{$row['Key']}} </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="text-center py-8 align-middle justify-center">
                        <a class="float-right border bg-blue-300 border-blue-800 px-6 py-2 rounded block w-48 text-center hover:bg-blue-400" href="{{ route('easydb.editTable', ['name' => $name]) }}">Edit</a>
                        <a class="float-left border bg-gray-50 border-grey-800 px-6 py-2 rounded block w-48 text-center hover:bg-grey-100" href="{{ route('easydb.index', ['name' => $name]) }}">Back</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>

