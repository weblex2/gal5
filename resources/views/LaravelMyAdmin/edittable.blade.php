@extends('layouts.LaravelMyAdminMaster')  
@section('content') 
   <form id="editTable" method="POST" action="{{ route('LaravelMyAdmin.saveTable', ['dbName'=>$dbName]) }}">
        @csrf
        <table class="w-full">
        @php
            $i=0;
            $pk_icon="";    
        @endphp    

    
        <tr class="bg-slate-500 text-orange-500">
            <th class="text-left p-2 border-r">#</th>
            <th class="text-left p-2 border-r">Keys</th>
            <th class="text-left p-2 border-r">Column Name</th>
            <th class="text-left p-2 border-r">Data Type</th>
            <th class="text-left p-2 border-r">Data Length</th>
            <th class="text-left p-2 border-r">PRECISION</th>
            <th class="text-left p-2 border-r">AUTO INCREMENT</th>
            <th class="text-left p-2 border-r">NULLABLE</th>
            <th class="text-left p-2 border-r">DEFAULT</th>
            <th class="text-left p-2 border-r">COLLATION</th>
        </tr>    
        @foreach ($databases[$dbName]['TABLES'][$tableName]['COLUMN'] as $columnName => $column)
            
            @php 
                $class = $i % 2 !== 0 ? 'bg-white' : 'bg-gray-100'; $i++; 
            @endphp
            <tr class="{{ $class }}  border-b transition duration-300 ease-in-out hover:bg-yellow-100 hover:border-yellow-200">
                <td class="p-2 border-r">{{ $i }}</td>
                <td class="p-2 border-r"> 
                    @if ($column->COLUMN_KEY=='PRI')
                        <i class="fa-solid fa-key text-yellow-500" title="Primary Key"></i> 
                        <input type="hidden" name="col[{{ $i }}][key_pri]" value="Y">
                    @endif
                </td>    
                <td class="p-2 border-r">
                    <span> {{ $pk_icon }}
                        <input type="text" name="col[{{ $i }}][name]" value="{{ $columnName }}">
                    </span>
                    
                </td>
                @php
                    $selected  = $column->DATA_TYPE;
                @endphp
                <td class="p-2 border-r" >
                    <span> 
                        @php
                            $data = $selected."|".$i;
                            $data = $selected."|".$i.'|'.$column->TABLE_COLLATION;
                        @endphp
                        <x-data-type :collation="$data" ></x-data-type>
                    </span>
                </td>
                <td class="p-2 border-r"><span><input type="text" name="col[{{ $i }}][length]" value="{{ $column->CHARACTER_MAXIMUM_LENGTH }}"></span></td>
                <td class="p-2 border-r"><span><input type="text" name="col[{{ $i }}][precision]" value="{{ $column->NUMERIC_PRECISION }}"></span></td>
                <td class="p-2 border-r"><span><input type="checkbox" name="col[{{ $i }}][auto_increment]" {{ $column->AUTO_INCREMENT == '1' ? 'checked' : '' }}></span></td>
                <td class="p-2 border-r"><span><input type="checkbox" name="col[{{ $i }}][nullable]" {{ $column->IS_NULLABLE == 'YES' ? 'checked' : '' }}></span></td>
                <td class="p-2 border-r"><span><input type="text" name="col[{{ $i }}][default]" value="{{ $column->COLUMN_DEFAULT}}"></span></td>
                <td class="p-2 border-r">
                    <span>
                        <x-collation :selected="$data" ></x-collation>
                    </span>
                </td>
            </div>
            </tr>
        @endforeach
        <tr>
            <td colspan=10>
                <button  type="submit"
                class="bg-orange-900 text-white px-3 py-2 rounded-md text-sm font-medium" 
                aria-current="page">
                Button
                </button>
            </td>    
        </tr>    
        </table>
        <input type="hidden" name="dbName" value="{{ $dbName }}">
        <input type="hidden" name="tableName" value="{{ $tableName }}">
  </form>
@endsection