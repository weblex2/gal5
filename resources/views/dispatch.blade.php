@php
    dump($_SERVER);    
@endphp
@if ($_SERVER['HTTP_HOST']=="gallery.noppal.de")
    return  redirect()->route("gallery");   
@endif
