@extends('layouts.LaravelMyAdminMaster')  
@section('content')  
  <h1>Edit DB {{ $dbName ." / ". $tableName}}</h1>
    <table class="w-full border">
    @php
        $i=0;
    @endphp    
    <tr class="bg-slate-600 text-orange-500">
        <th class="text-left p-2 border-rw-0.5 ">#</th>
        <th class="text-left p-2 border-r">Column Name</th>
        <th class="text-left p-2 border-r">Show</th>
        <th class="text-left p-2 border-r">Struktur</th>
        <th class="text-left p-2 border-r">Collation</th>
    </tr>    
    @foreach ($databases[$dbName]['TABLES'][$tableName]['COLUMN'] as $columnName => $column)
        @php 
            $class = $i % 2 !== 0 ? 'bg-white' : 'bg-gray-100'; $i++; 
        @endphp
        <tr class="{{ $class }}  border-b transition duration-300 ease-in-out hover:bg-yellow-100 hover:border-yellow-200">
            <td class="p-2 border-r">{{ $i }}</td>
            <td class="p-2 border-r">
                <a href="{{ route('LaravelMyAdmin.editColumn', ['dbName' => $dbName , 'tableName' => $tableName, 'columnName' => $columnName ]) }}"> 
                <span> &nbsp;
                    {{ $columnName }}
                </span>
                </a>
            </td>
            <td class="p-2 border-r" ><span>Edit</span></td>
            <td class="p-2 border-r"><span>Struktur</span></td>
            <td class="p-2 border-r"><span>{{ $column->COLLATION_NAME }}</span></td>
        </div>
        </tr>
    @endforeach
    </table>
@endsection