@php $class = $row % 2 !== 0 ? 'bg-white' : 'bg-gray-50'; @endphp
<tr class="datarow {{ $class }}">
    <td class="border p-2"><input type="text" name="col[{{ $row }}][column_name]"></td>
    <td class="border p-2"><input type="checkbox" name="col[{{ $row }}][nullable]"></td>
    <td class="border p-2">
        <select name="col[{{ $row }}][datatype]">
            <option value="0"></option>
            <option value="bigint">bigint</option>
            <option value="string">string</option>
            <option value="string">varchar</option>
            <option value="number">number</option>
            <option value="timestamp">timestamp</option>
        </select></td>
    <td class="border p-2"><input type="text" name="col[{{ $row }}][datalength]"></td>
    <td class="border p-2"><input type="text" name="col[{{ $row }}][data_precision]"></td>
    <td class="border p-2">
        <select name="col[{{ $row }}][signed]">
            <option value=""></option>
            <option value="signed">signed</option>
            <option value="unsigned" >unsigned</option>
        </select>
    </td>
    <td class="border p-2"><input type="text" name="col[{{ $row }}][default]"></td>
    <td class="border p-2">
        <select name="col[{{ $row }}][index]">
            <option value=""></option>
            <option value="PRI">Primary</option>
            <option value="UNI" >Unique</option>
        </select>
    </td>
    <td class="border p-2"><span class="fa trash-can"></span><img  class="cursor-pointer" src="{{asset('img/delete.png')}}" width="20" onclick="deleteRow($(this))"></td>
</tr>
