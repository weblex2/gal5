<div class="p-2 db-all mh-screen-full overflow-auto">
    {{-- Server --}}
   
    @php
        $selectedDb="";
        if (isset($dbName)){
            $selectedDb = $dbName;  
        }
    @endphp
    {{ $dbName }}
    
    <div class="">
        <i class="fa-solid fa-server text-slate-600"></i>&nbsp;
        Server {{ env('db_host') }}
    </div>
    @foreach($databases as $dbname => $db)
        {{-- Databse --}}
        @php
            $class = "";
            if ($dbname==$selectedDb) {
                $class = "text-green-500";
            }       
            else { 
                $class= "";
            }     
        @endphp

        <div class="db  pl-3 cursor-pointer {{ $class }}">
            <i class="fa fa-database text-orange-800"></i></i>&nbsp;
            <span class="dbname">{{ $dbname }} </span>
            {{-- Tables --}}
            @foreach ($databases[$dbname]['TABLES'] as $tableName => $table )
                @php
                    if ($dbname==$selectedDb){
                        $class = " text-black ";
                    }
                    else {
                        $class=" hidden";
                    }
                @endphp
               <div class="table pl-3 {{ $class }}">
                <i class="fa-solid fa-table text-slate-500"></i> 
                    <span class="">{{ $tableName }}</span>
                    
                    @foreach ($databases[$dbname]['TABLES'][$tableName]['COLUMN'] as $columnName => $column )
                        <div class="column pl-3 hidden">
                                <span class="font-semibold">    
                                {{ $columnName }}
                                (
                                    {{ $column->DATA_TYPE }}
                                    @isset ($column->CHARACTER_MAXIMUM_LENGTH)
                                    @endisset
                                    {{ $column->CHARACTER_MAXIMUM_LENGTH }}
                                )
                                </span>
                        </div>
                    @endforeach 
                </div>
            @endforeach
        </div>
    @endforeach
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
</div>

<script>
    $(function(){
       $('.db').click(function(){
          
          if ($(this).hasClass('open')){
            $(this).find('.table').hide();  
            $(this).removeClass('open');    
            return false;
          }      
          $(this).addClass('open'); 
          $('.table').hide();
          $(this).find('.table').show();
          
          
          var db = $(this).closest('.db').find('.dbname').text();
          let url = "{{ route('LaravelMyAdmin.editDb', [':db']) }}".replace(':db', db);
          $.ajax({
               type: 'get',
               url: url,
               success: function (resp) {
                   $('#main').html(resp);
               }
          });
       });

       /*
       $('.table').click(function(e){
          e.stopPropagation();
          $(this).find('.column').toggle();
          var db = $(this).closest('.db').find('.dbname').text();
          var tn = $(this).closest('.table').find('.tablename').text();
          //let url = "{{ route('LaravelMyAdmin.editDb', [':db', ':tn']) }}".replace(':db', db).replace(':tn', tn);
          $.ajax({
               type: 'get',
               url: url,
               success: function (resp) {
                   $('#main').html(resp);
               }
          });
       });

       $('.column').click(function(e){
           e.stopPropagation();
           console.log( $(this).find('.colname').text());
           var db = $(this).closest('.db').find('.dbname').text();
           var tn = $(this).closest('.table').find('.tablename').text();
           var cn = $(this).find('.columnname').text();
           //let url = "{{ route('LaravelMyAdmin.editDb', [':db', ':tn', ':cn']) }}".replace(':db', db).replace(':tn', tn).replace(':cn', cn);
           $.ajax({
               type: 'get',
               url: url,
               success: function (resp) {
                   $('#main').html(resp);
               }
           });
       });
       */
    });
</script>