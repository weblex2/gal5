   <table class="w-full">
    @php
        $i=0;
    @endphp    
    <tr class="bg-slate-800 text-orange-500">
        <th class="text-left p-2">Table Name</th>
        <th class="text-left p-2">Show</th>
        <th class="text-left p-2">Struktur</th>
        <th class="text-left p-2">Collation</th>
    </tr>    
    @foreach ($tables as $table_name => $table)
        @php 
            $class = $i % 2 !== 0 ? 'bg-slate-300' : 'bg-slate-400'; $i++; 
            $sn = $table->SCHEMA_NAME;
        @endphp
        <tr class="{{ $class }} transition duration-300 ease-in-out hover:bg-yellow-100 hover:border-yellow-200">
            <td class="p-2">
                <span>
               
                    {{ $table_name }}
                </span>
            </td>
            <td class="p-2" ><span>Anzeigen</span></td>
            <td class="p-2"><span>Struktur</span></td>
            <td class="p-2"><span>{{ $table->TABLE_COLLATION }}</span></td>
        </div>
        </tr>
    @endforeach
    </table>