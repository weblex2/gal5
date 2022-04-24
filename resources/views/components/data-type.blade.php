@php
    echo $collation;
    #$arr = explode('|', $collation);
    #$selected  = $arr[0];
    #$col  = $arr[1];
    #print_r($col);
@endphp
<div>    
    <select name="col[{{ $col }}][type]">
        <option  value="" {{$selected == '' ? "selected" : ""}}>---select---</option> 
        <option value="int" {{$selected == 'bigint' ? "selected" : ""}}>bigint</option>
        <option value="tinyint" {{$selected == 'tinyint' ? "selected" : ""}}>tinyint</option>
        <option value="decimal" {{$selected == 'decimal' ? "selected" : ""}}>decimal</option>
        <option value="text" {{$selected == 'text' ? "selected" : ""}}>text</option>
        <option value="char" {{$selected == 'char' ? "selected" : ""}}>char</option>
        <option value="varchar" {{$selected == 'varchar' ? "selected" : ""}}>varchar</option>
        <option value="int" {{$selected == 'int' ? "selected" : ""}}>int</option>
        <option value="timestamp" {{$selected == 'timestamp' ? "selected" : ""}}>timestamp</option>
        <option value="longtext" {{$selected == 'longtext' ? "selected" : ""}}>longtext</option>
        <option value="binary" {{$selected == 'binary' ? "selected" : ""}}>binary</option>
        <option value="datetime" {{$selected == 'datetime' ? "selected" : ""}}>datetime</option>
    </select>     
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
</div>