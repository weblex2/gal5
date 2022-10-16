<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
Hi Browser ext
<script>
    $(function(){
        var authInfo = {
            email: 'noppenbe@gmx.de',
            pw: 'hotl!ne03',
         };
         var topic  = 'JS';   
         var desc  = 'Descr';
         var body  = 'MyJsBody';
         var email = 'noppenbe@gmx.de';
         var pw = 'hotl!ne03';
         $.ajax({
            url: "localhost:8000/api/login",
            type: "post",
            dataType  : 'json',
            data: authInfo ,

            success: function (response) {
                alert(response);    
                // You will get response from your PHP page (what you echo or print)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }, 'json');
    });
</script>   