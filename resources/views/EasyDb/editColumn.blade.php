<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EasyDb - Create Table ') }}
        </h2>
    </x-slot>

    

    <div class="db_overview border h-5/6 absolute p-5 bg-grey-300 w-1/5 z-30 overflow-auto">
        <div><i class="fa-solid fa-server text-stone-600"></i>&nbsp;{{ env('DB_HOST') }} </div>
        @foreach ($databases as $dbname => $row)
            <div class="db cursor-pointer pl-4">
                <i class="fa-solid fa-database text-orange-700"></i>&nbsp;
                {{ $dbname }}
                @foreach ($row['TABLES'] as $table_name => $table)
                    <div class="table hidden cursor-pointer pl-4">
                        <i class="fa-solid fa-table text-blue-900"></i>&nbsp;{{ $table_name }}
                        @foreach ($table['COLUMN'] as $colname => $col )
                            <div class="column hidden cursor-pointer hover:bg-yellow-100 pl-4">
                                <i class="fa-solid fa-table-columns text-green-500"></i>&nbsp;
                                <a href="{{ route('easydb.editColumn', ['db'=>$dbname, 'table_name' => $table_name, 'column_name' =>$colname ]) }} ">
                                <b>{{ $colname }}</b> ({{ $col->DATA_TYPE }}
                                @isset ($col->CHARACTER_MAXIMUM_LENGTH)
                                &nbsp;
                                @endisset
                                {{ $col->CHARACTER_MAXIMUM_LENGTH }})
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach   
            </div>
        @endforeach
    </div>
    <div class="border h-5/6 w-4/5 justify-center  absolute border z-30 right-0">

        
          
        <div id="tabs">
            
            <ul class="text-sm font-medium text-center text-gray-500 rounded-lg divide-x divide-gray-200 shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
                <li class="w-full">
                    <a href="#tabs-2" class="inline-block p-4 w-full bg-white hover:text-gray-700 hover:bg-gray-50  dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Anzeigen</a>
                </li>
                <li class="w-full">
                    <a href="#tabs-3" class="inline-block p-4 w-full bg-white hover:text-gray-700 hover:bg-gray-50  focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Struktur</a>
                </li>
                <li class="w-full">
                    <a href="#tabs-4" class="inline-block p-4 w-full bg-white hover:text-gray-700 hover:bg-gray-50  focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">SQL</a>
                </li>
                <li class="w-full">
                    <a href="#tabs-5" class="inline-block p-4 w-full bg-white hover:text-gray-700 hover:bg-gray-50  focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Einfügen</a>
                </li>
                <li class="w-full">
                    <a href="#tabs-3" class="inline-block p-4 w-full bg-white hover:text-gray-700 hover:bg-gray-50  focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Export</a>
                </li>
                <li class="w-full">
                    <a href="#tabs-4" class="inline-block p-4 w-full bg-white hover:text-gray-700 hover:bg-gray-50  focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Import</a>
                </li>
                <li class="w-full">
                    <a href="#tabs-5" class="inline-block p-4 w-full bg-white hover:text-gray-700 hover:bg-gray-50  focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Rechte</a>
                </li>
                <li class="w-full">
                    <a href="#tabs-3" class="inline-block p-4 w-full bg-white hover:text-gray-700 hover:bg-gray-50  focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Operationen</a>
                </li>
                <li class="w-full">
                    <a href="#tabs-4" class="inline-block p-4 w-full bg-white hover:text-gray-700 hover:bg-gray-50  focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Nachvervolgung</a>
                </li>
                <li class="w-full">
                    <a href="#tabs-5" class="inline-block p-4 w-full bg-white rounded-r-lg hover:text-gray-700 hover:bg-gray-50  dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Trigger</a>
                </li>
            </ul>
            <div id="tabs-2">
                <div class="py-12"  class="hidden">
                    <div class="mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <form method="POST" action="{{ route('easydb.saveTable') }}" >
                                @csrf
                            <div class="p-6 bg-white border-b border-gray-200">
                                <table id="tblColDetails" class="w-full">
                                    <th class="border px-2 py-4">Column Name</th>
                                    <th class="border p-2">Null</th>
                                    <th class="border p-2">Data Type</th>
                                    <th class="border p-2">Length</th>
                                    <th class="border p-2">Precision</th>
                                    <th class="border p-2">Signed</th>
                                    <th class="border p-2">Default</th>
                                    <th class="border p-2">Key</th>
                                    <th class="border p-2">Del</th>
                                    @php $i=0; @endphp
                                    @foreach ($databases as $i => $row)
                                        
                                        @php $class = $i % 2 !== 0 ? 'bg-white' : 'bg-gray-50'; $i++; @endphp
                                        <tr rowid="{{ $i }}" class="{{ $class }} border-b transition duration-300 ease-in-out hover:bg-yellow-100 border-yellow-200">
                                            <td class="border p-2 "><input type="text" name="column_name_{{ $loop->iteration }}" value="{{ $row['Field'] }}"></td>
                                            <td class="border p-2"><input type="checkbox" {{  ($row['Null'] == 'YES' ? ' checked' : '') }}></td>
                                            <td class="border p-2"> <select>
                                                    <option value="0" {{ $row['datatype'] == '' ? 'selected' : '' }}></option>
                                                    <option value="bigint" {{ $row['datatype'] == 'bigint' ? 'selected' : '' }}>bigint</option>
                                                    <option value="string" {{ $row['datatype'] == 'string' ? 'selected' : '' }}>string</option>
                                                    <option value="varchar" {{ $row['datatype'] == 'varchar' ? 'selected' : '' }}>varchar</option>
                                                    <option value="number" {{ $row['datatype'] == 'number' ? 'selected' : '' }}>number</option>
                                                    <option value="timestamp" {{ $row['datatype'] == 'timestamp' ? 'selected' : '' }}>timestamp</option>
                                                </select>
                                            </td>
                                            <td class="border p-2">
                                                @if ($row['datatype']!='timestamp')
                                                <input type="text" name="datalength{{ $loop->iteration }}" value="{{ $row['datalength'] }}">
                                                @else
            
                                                @endif
                                            </td>
                                            <td class="border p-2">
                                                <input type="text" name="data_precision_{{ $loop->iteration }}" value="{{ $row['data_precision'] }}">                                </td>
                                            <td class="border p-2">
                                                <select>
                                                    <option value="" {{ $row['signed'] == '' ? 'selected' : '' }}></option>
                                                    <option value="signed" {{ $row['signed'] == 'signed' ? 'selected' : '' }}>signed</option>
                                                    <option value="unsigned" {{ $row['signed'] == 'unsigned' ? 'selected' : '' }}>unsigned</option>
                                                </select>
            
                                            </td>
                                            <td class="border p-2"><input type="text" name="default_{{ $loop->iteration }}" value="{{ $row['Default'] }}"></td>
                                            <td class="border p-2">
                                                <select name="index_{{ $loop->iteration }}">
                                                    <option value="" {{ $row['Key'] == '' ? '' : '' }}></option>
                                                    <option value="PRI" {{ $row['Key'] == 'PRI' ? 'selected' : '' }}>Primary</option>
                                                    <option value="UNI" {{ $row['Key'] == 'UNI' ? 'selected' : '' }}>Unique</option>
                                                </select>
            
                                            </td>
                                            <td class="border p-2"><img class="cursor-pointer" src="{{asset('img/delete.png')}}" width="20" onclick="deleteRow($(this))"></td>
                                        </tr>
                                    @endforeach
                                </table>
            
                                <div class="text-center py-8 align-middle justify-center">
                                    <button class="btn_add float-left border bg-blue-300 border-blue-800 px-6 py-2 rounded block w-48 text-center hover:bg-blue-400">Add Column</button>
                                    <button type="submit" class="float-right border bg-green-300 border-green-500 px-6 py-2 rounded block w-48 text-center hover:bg-green-600 border-green-800">Save</button>
                                </div>
                            </div>
                            <input type="hidden" name="table_name" value="{{$name}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabs-3" class="hidden">
                <p>Struktur</p>
            </div>
            <div id="tabs-4"  class="hidden">
                <p>Tab-3</p>
            </div>
            <div id="tabs-5"  class="hidden">
                <p>Tab-4</p>
            </div>
        </div>  
        
    </div>
    
</x-app-layout>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".btn_add").click(function (e) {
            e.preventDefault();
            var row = $('#tblColDetails').find('.datarow').length+1;
            var url = "{{route('easydb.createNewTableDetailRow', '')}}"+"/"+row;
            $.ajax({
                type: 'GET',
                url: url,
                //data: {rows: rows},
                success: function (resp) {
                    $('#tblColDetails').append(resp);
                }
            });

        });

        $('.db').click(function(){
            $('.db_overview').find('.table').hide();    
            $(this).find('.table').show();
        });

        $('.table').click(function(){
            $('.db_overview').find('.column').hide();    
            $(this).find('.column').show();
        });

        $('#tabs').tabs();    
    });
    
</script>


