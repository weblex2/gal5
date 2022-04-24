<div class="p-2 db-all mh-screen-full overflow-auto">
    {{-- Server --}}
   
    @php
        if (!isset($databases)){
            $databases = [];
        }
        $selectedDb = session('selectedDb');
        $selectedTable = session('selectedTable');
        $selectedColumn = session('selectedColumn');
    @endphp
    <div class="">
        <i class="fa-solid fa-server text-slate-600"></i>&nbsp;
        Server {{ env('db_host') }}
    </div>
    @foreach($databases as $dbName => $db)
        {{-- Databse --}}
        @php
            $class = "";
            if ($dbName==$selectedDb) {
                $class = "text-slate-200 text-bold";
            }       
            else { 
                $class= "";
            }     
        @endphp

        <div class="db  pl-3 cursor-pointer {{ $class }}">
            <i class="fa fa-database text-orange-800"></i></i>&nbsp;
            <span class="dbname">
                <a href="{{ route("LaravelMyAdmin.editDb", ['dbName' => $dbName]) }}">
                {{ $dbName }}
                </a> 
            </span>
            {{-- Tables --}}
            @foreach ($databases[$dbName]['TABLES'] as $tableName => $table )
                @if ($tableName!="")
                    @php
                       
                    if ($dbName==$selectedDb && $tableName == $selectedTable) {
                        $class1 = "text-bold";
                    }       
                    elseif ($dbName==$selectedDb){
                        $class1= "text-slate-900";
                    }    
                    else { 
                            $class1= " hidden ";
                    }   
                    @endphp
                    <div class="table pl-3 {{ $class1 }}">
                        <i class="fa-solid fa-table text-slate-500"></i> 
                        <a href="{{ route("LaravelMyAdmin.editTable", ['dbName' => $dbName, 'tableName' => $tableName]) }}">
                            <span class="table-name">{{ $tableName }}</span>
                        </a>    
                            
                        @foreach ($databases[$dbName]['TABLES'][$tableName]['COLUMN'] as $columnName => $column )
                            @php
                            if ($tableName==$selectedTable){
                                $classt = " text-slate-600 ";
                            }
                            else {
                                $classt=" hidden ";
                            }
                            @endphp
                            <div class="column pl-3 {{ $classt }}">
                            <span class="font-semibold">   
                                <a href="{{ route("LaravelMyAdmin.editColumn", ['dbName' => $dbName, 'tableName' => $tableName, 'columnName' => $columnName]) }}">
                                    <i class="fa-solid fa-table-cells"></i> 
                                    {{ $columnName }}
                                
                                (
                                {{ $column->DATA_TYPE }}
                                @isset ($column->CHARACTER_MAXIMUM_LENGTH)
                                @endisset
                                {{ $column->CHARACTER_MAXIMUM_LENGTH }}
                                )
                                </a>
                            </span>
                            </div>
                        @endforeach 
                    </div>
                @else
                    @php
                        if ($dbName==$selectedDb){
                            $class = " text-black ";
                        }
                        else {
                            $class=" hidden";
                        }
                    @endphp
                    <div class="table pl-4 text-slate-500 {{ $class }}">    
                        <span>No Tables found</span>        
                    </div>    
                @endif

            @endforeach
        </div>
    @endforeach
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
</div>

