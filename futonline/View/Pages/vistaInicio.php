<?php 
header( 'Content-Type: text/html;charset=utf-8' );  
session_start();
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">

<HTML>
<HEAD><TITLE> FutonLine </TITLE></HEAD>

     <FRAMESET COLS=20%,80% NORESIZE>
         <?php if (!isset($_SESSION["usuario"])){?>
           <FRAME SRC="/futonline/View/Pages/vistaMenu.php" noresize="noresize" name ="fMenu">
               <?php }else if($_SESSION["nivelPermiso"]==1){?>
               <FRAME SRC="/futonline/View/Pages/vistaMenuLogueado.php" noresize="noresize" name ="fMenu">
                   
               <?php }else if($_SESSION["nivelPermiso"]==2){?>
               <FRAME SRC="/futonline/View/Pages/vistaMenuLogueadoE.php" noresize="noresize" name ="fMenu">
                   
               <?php }else if($_SESSION["nivelPermiso"]==3){?>
               <FRAME SRC="/futonline/View/Pages/vistaMenuLogueadoA.php" noresize="noresize" name ="fMenu">
                   <?php } ?>
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