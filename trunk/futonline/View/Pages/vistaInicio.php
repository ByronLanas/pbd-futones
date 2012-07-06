<?php 
header( 'Content-Type: text/html;charset=utf-8' );  
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<?php
session_start(); 
session_destroy();
?>
<HTML>
<HEAD><TITLE> FutonLine </TITLE></HEAD>

     <FRAMESET COLS=20%,80% NORESIZE>

           <FRAME SRC="/futonline/View/Pages/vistaMenu.php" noresize="noresize" name ="fMenu">
               <FRAMESET ROWS=93%,7% NORESIZE>
                   <FRAME SRC="/futonline/View/Pages/vistaPaginaInicio.php" noresize="noresize" name="fPagina">
                       <FRAME SRC="/futonline/View/Pages/vistaInfoEmpresa.php" noresize="noresize" name="fInfo">
               </frameset>
           

     </FRAMESET>

     <NOFRAMES>
         <BODY>
             Lo siento,su navegador no soporta frames.

         </BODY>
     </NOFRAMES>

</HTML>