 @extends('layouts.LaravelMyAdminMaster')  
   @section('content')
   <table class="w-full border-b border-slate-600">
    <tr>
        <td colspan="4" class="px-2 py-5">
            <form action="{{ 'LaravelMyAdmin.CreateNewTable' }}" action="POST">
            <span class="text-black ">Create new Table</span> 
            <span class="ml-1 "><input typt="text" class="rounded px-2 pb-1 pt-2 text-sm" name="newtable" placeholder="NEWTABLE"></span>
            </
        </td>
    </tr>  

    @php
        $i=0;
    @endphp    
         
    <tr class="bg-slate-600 text-orange-500">
        <th class="text-left p-2">Table Name</th>
        <th class="text-left p-2">Show</th>
        <th class="text-left p-2">Struktur</th>
        <th class="text-left p-2">Collation</th>
    </tr>   
    
    @foreach ($tables as $table_name => $table)
        @php 
            $class = $i % 2 !== 0 ? 'bg-slate-200' : 'bg-slate-300'; $i++; 
            $sn = $table->SCHEMA_NAME;
        @endphp
        <tr class="{{ $class }} transition duration-300 ease-in-out hover:bg-yellow-100 hover:border-yellow-200">
            <td class="p-2">
                <span class="table">
                    <a href="{{ route("LaravelMyAdmin.editTable",['dbName' => $dbName,  'tableName' => $table_name]) }}">
                    {{ $table_name }}
                    </a>
                </span>
            </td>
            <td class="p-2" ><span>Anzeigen</span></td>
            <td class="p-2"><span>Struktur</span></td>
            <td class="p-2"><span>{{ $table->TABLE_COLLATION }}</span></td>
        </div>
        </tr>
    @endforeach
    @if (count($tables)==0)
        <tr>
            <td colspan="4">No Tables found!</td>
        </tr>    
    @endif 
    </table>
    @endsection