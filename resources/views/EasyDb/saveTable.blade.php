<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EasyDb -  ') }} {{strtoupper(env('DB_DATABASE')) }} / {{ strtoupper($name) }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('easydb.saveTable') }}" >
                    @csrf
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="tblColDetails">
                        <th class="border p-2">Column Name</th>
                        <th class="border p-2">Null</th>
                        <th class="border p-2">Data Type</th>
                        <th class="border p-2">Length</th>
                        <th class="border p-2">Signed</th>
                        <th class="border p-2">Default</th>
                        <th class="border p-2">Key</th>
                        @foreach ($data as $row)
                            <tr>
                                <td class="border p-2"><input type="text" name="column_name_{{ $loop->iteration }}" value="{{ $row['Field'] }}"></td>
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
                                    xxx
                                    @endif
                                </td>
                                <td class="border p-2">
                                    @if ($row['datatype']!='timestamp')
                                        <input type="text" name="data_precision_{{ $loop->iteration }}" value="{{ $row['datalength'] }}">
                                    @else
                                        xxx
                                    @endif
                                </td>
                                <td class="border p-2">
                                    <select>
                                        <option value="" {{ $row['signed'] == '' ? 'selected' : '' }}></option>
                                        <option value="signed" {{ $row['signed'] == 'signed' ? 'selected' : '' }}>signed</option>
                                        <option value="unsigned" {{ $row['signed'] == 'unsigned' ? 'selected' : '' }}>unsigned</option>
                                    </select>
                                    {{$row['signed']}}
                                </td>
                                <td class="border p-2"><input type="text" name="default_{{ $loop->iteration }}" value="{{ $row['Default'] }}"></td>
                                <td class="border p-2">
                                    <select name="index_{{ $loop->iteration }}">
                                        <option value="" {{ $row['Key'] == '' ? '' : '' }}></option>
                                        <option value="PRI" {{ $row['Key'] == 'PRI' ? 'selected' : '' }}>Primary</option>
                                        <option value="UNI" {{ $row['Key'] == 'UNI' ? 'selected' : '' }}>Unique</option>
                                    </select>
                                    {{ $row['Key'] }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <button class="btn_add float-left bg-gray-50 px-4 py-2 border">Add Column</button>
                <button type="submit" class="ml-1 border float-left bg-gray-50 px-4 py-2">Submit</button>
                </form>
                <pre>
        {{ print_r($data) }}
            </pre>
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
            var rows = $('#tblColDetails').find('tr').length;
            var url = "{{route('easydb.createNewTableDetailRow', '')}}"+"/"+rows;
            $.ajax({
                type: 'GET',
                url: url,
                //data: {rows: rows},
                success: function (resp) {
                    $('#tblColDetails').append(resp);
                }
            });

        });

    });
</script>


