<?php
session_start(); 
$usuario=$_SESSION["usuario"];

?>

<a href="vistaDatosUsuario.php" target="fPagina"> <?php echo $usuario;?></a><br>
<a href="/futonline/View/Pages/vistaInicio.php" target="_parent">Cerrar Sesion</a><br><br>
