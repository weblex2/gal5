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
                                <b>{{ $colname }}</b> ({{ $col->DATA_TYPE }}
                                @isset ($col->CHARACTER_MAXIMUM_LENGTH)
                                &nbsp;
                                @endisset
                                {{ $col->CHARACTER_MAXIMUM_LENGTH }})
                            </div>
                        @endforeach
                    </div>
                @endforeach   
            </div>
        @endforeach
    </div>
    <div class="border h-5/6 w-4/5 justify-center  absolute border z-30 right-0">
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{ route('easydb.makeTable') }}" >
                        @csrf
                        <div class="p-6 bg-white border-b border-gray-200">
    
                            <table id="tblColDetails" class="w-full">
                                <tr>
                                    <th class="text-left">Table Name</th>
                                    <th colspan="8" class="text-left"><input type="text" name="table_name" value="new_table"></th>
                                </tr>
                                <tr>
                                    <th  class="text-left">Create Timestamps</th>
                                    <th colspan="8"  class="text-left"><input type="checkbox" name="createTimestamps"></th>
                                </tr>
                                <tr>
                                <th class="border px-2 py-4">Column Name</th>
                                <th class="border p-2">Null</th>
                                <th class="border p-2">Data Type</th>
                                <th class="border p-2">Length</th>
                                <th class="border p-2">Precision</th>
                                <th class="border p-2">Signed</th>
                                <th class="border p-2">Default</th>
                                <th class="border p-2">Key</th>
                                <th class="border p-2">Del</th>
                                </tr>
                                <tr class="datarow border-b transition duration-300 ease-in-out hover:bg-yellow-100 border-yellow-200">
                                    <td class="border p-2 "><input type="text" name="col[1][column_name]" value="myid"></td>
                                    <td class="border p-2"><input type="checkbox" name="col[1][nullable]"></td>
                                    <td class="border p-2">
                                        <select name="col[1][datatype]">
                                            <option value="0"></option>
                                            <option value="id" selected>id</option>
                                            <option value="bigint">bigint</option>
                                            <option value="string">string</option>
                                            <option value="string">varchar</option>
                                            <option value="number">number</option>
                                            <option value="timestamp">timestamp</option>
                                        </select>
                                    </td>
                                    <td class="border p-2">
                                           <input type="text"  name="col[1][datalength]" value="20">
                                    </td>
                                    <td class="border p-2">
                                            <input type="text" name="col[1][data_precision]" value="">
                                    </td>
                                    <td class="border p-2">
                                            <select name="col[1][signed]">
                                                <option value=""></option>
                                                <option value="signed">signed</option>
                                                <option value="unsigned" selected>unsigned</option>
                                            </select>
                                    </td>
                                        <td class="border p-2">
                                            <input type="text" name="col[1][default]" value="">
                                        </td>
                                        <td class="border p-2">
                                            <select name="col[1][index]">
                                                <option value=""></option>
                                                <option value="PRI">Primary</option>
                                                <option value="UNI">Unique</option>
                                            </select>
                                        </td>
                                        <td class="border p-2"><img src="{{asset('img/delete.png')}}" width="20"></td>
                                    </tr>
    
                            </table>
    
                            <div class="text-center py-8 align-middle justify-center">
                                <button type="button" class="btn_add float-left border bg-blue-300 border-blue-800 px-6 py-2 rounded block w-48 text-center hover:bg-blue-400">Add Column</button>
                                <button type="submit" class="float-right border bg-green-300 border-green-500 px-6 py-2 rounded block w-48 text-center hover:bg-green-600 border-green-800">Save</button>
                            </div>
                        </div>
    
    
                    </form>
                </div>
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
        })
    });
</script>


