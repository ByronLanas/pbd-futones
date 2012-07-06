<?php 
header( 'Content-Type: text/html;charset=utf-8' );  
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<body style="background-color:#F9BD0F; font: Helvetica 12pt;">
<form action="/futonline/Controller/login.php" method="POST">
        <tc>
            
            User: <input id="usuario" type="text" name="usuario" value=""  />
            
 
        </tc>
        <tc>
            <br>
            Pass: <input type="password" name="password" value="" />
            
        </tc>
        <tr>
            
                <input type="submit" value="Ingresar" name="ingresar" />
           
        </tr>
        
</form>