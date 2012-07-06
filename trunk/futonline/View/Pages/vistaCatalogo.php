<?php
session_start();


if (!isset($_SESSION["usuario"])){
    
    ?><body>
<script type="text/javascript">
window.location="/futonline/View/Pages/vistaInicio.php";
</script>
</body><?php
    
    }
 $usuario=$_SESSION["usuario"];

?><?php 
header( 'Content-Type: text/html;charset=utf-8' );  
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<body style="background-color:#0A8A9A; font: Helvetica 12pt;">

  <style type="text/css">
<!--
.Estilo2 {font-size: 13px}
.mm {
	text-align: center;
}
-->
</style>

<br><br>
<div align="center">
    <table border="0">

        <tr>
            <td><div align="center">
                    <a href="../../Controller/ControladorCatalogo.php?tipoProducto=futon">
                        <img src="../Elements/futon.jpg" width="255" height="200" alt="futon"/><br>
                        <span class="Estilo2"><strong>FUTONES</strong></span>
                    </a>
                </div>
            </td>
            
            <td><div align="center">
                    <a href="../../Controller/ControladorCatalogo.php?tipoProducto=pera">
                        <img src="../Elements/peras.jpg" width="239" height="200" alt="peras"/><br>
                        <span class="Estilo2"><strong>PERAS</strong></span>
                    </a>
                </div>
            </td>
            
            <td><div align="center">
                    <a href="../../Controller/ControladorCatalogo.php?tipoProducto=cama">
                        <img src="../Elements/camas.jpg" width="243" height="200" alt="camas"/><br>
                        <span class="Estilo2"><strong>CAMAS</strong></span>
                    </a><br>
                </div>
            </td>
            
        </tr>

        <tr>
            <td><div align="center">
                    <a href="../../Controller/ControladorCatalogo.php?tipoProducto=cubre futon">
                        <img src="../Elements/cubrefuton.jpg" width="288" height="200" alt="cubrefutones"/><br>
                        <span class="Estilo2"><strong>CUBRE FUTONES</strong></span>
                    </a>
                </div>
            </td>
            
            <td><div align="center">
                    <a href="../../Controller/ControladorCatalogo.php?tipoProducto=puff">
                        <img src="../Elements/puff.jpg" width="226" height="200" alt="puff"/><br>
                        <span class="Estilo2"><strong>PUFF</strong></span>
                    </a>
                </div>
            </td>
            
            <td><div align="center">
                    <a href="../../Controller/ControladorCatalogo.php?tipoProducto=cojin">
                        <img src="../Elements/cojines.JPG" width="266" height="200" alt="cojines"/><br>
                        <span class="Estilo2"><strong>COJIN</strong></span>
                    </a>
                </div>
            </td>
            

        
            
        </tr>
        
        
    </table>
</div>

<br><br>

