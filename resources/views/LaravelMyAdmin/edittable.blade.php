@extends('layouts.LaravelMyAdminMaster') 
@section('content')
    <pre>
    {{ print_r(count(($databases[$dbName]['TABLES']))) }}
    </pre>
    <h1>Edit DB {{ $dbName }}</h1>
    <pre>
         {{-- {{ print_r($tables) }}  --}}
    </pre>    
    {{ $tableName }}
    <table class="w-full border">
    @php
        $i=0;
    @endphp    
    <tr>
        <th class="text-left p-2">Table Name</th>
        <th class="text-left p-2">Show</th>
        <th class="text-left p-2">Struktur</th>
        <th class="text-left p-2">Collation</th>
    </tr>    
    @foreach ($databases[$dbName]['TABLES'][$tableName]['COLUMN'] as $column_name => $column)
        @php 
            $class = $i % 2 !== 0 ? 'bg-white' : 'bg-gray-100'; $i++; 
        @endphp
        <tr class="{{ $class }}  border-b transition duration-300 ease-in-out hover:bg-yellow-100 hover:border-yellow-200">
            <td class="p-2">
                <span>{{ $i }} &nbsp;
                {{-- <a href="{{ route('lma.editTable', ['db_name' => $sn , 'table_name' => $table_name ]) }}"> --}}
                    {{ $column_name }}
                {{-- </a> --}}
                </span>
            </td>
            <td class="p-2" ><span>Anzeigen</span></td>
            <td class="p-2"><span>Struktur</span></td>
            <td class="p-2"><span>{{ $column->COLLATION_NAME }}</span></td>
        </div>
        </tr>
    @endforeach
    </table>
@endsection