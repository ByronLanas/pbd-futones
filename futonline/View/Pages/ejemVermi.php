<?php

echo '<html><title>FutonLine</title>';
       echo '<head>Usuario: <form method="GET">
</form>';
       echo '<head>Password: <form method="GET">
</form>';
       echo '<body> Bienvenido a FutonLine</body>'   ;    
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script>
<script>
    function evalua(){
        var user = document.getElementById("usuario").value;
        
     $.get("View/Pages/pagina.php", { evalua:user }, function(data)
        {
            document.getElementById("contenedor").innerHTML=data;
            /*
            if(data == "MAL"){
             document.getElementById("error_user").style.display = "block";
            }else{
                if(data =="BIEN"){
                    document.getElementById("error_user").style.display = "none";
                }
            }*/
                // lo que quieras con el valor de data
        }, "html");   
    } 
</script>
<form action="Controller/asd.php" method="POST">
        <table border = "1">
        <tr>
            <td>
            User: <input id="usuario" type="text" name="usuario" value="" onblur="evalua()" /><br>
            <span id="error_user" style="display: none;" >No existe el cliente</span>
            </td>
        </tr>
        <tr>
            <td>
            Pass: <input type="password" name="password" value="" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Ingresar" name="ingresar" />
            </td>
        </tr>
        </table>
</form><div id="contenedor"></div>


