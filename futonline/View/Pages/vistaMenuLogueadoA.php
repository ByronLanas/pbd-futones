<?php 
header( 'Content-Type: text/html;charset=utf-8' );  
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">

<body style="background-color:#F9BD0F; font: Helvetica 12pt;">
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

?>

<a href="/futonline/Controller/controladorDatosUsuario.php?accion=obtener" target="fPagina"> <?php echo $usuario;?></a><br>
<a href="/futonline/View/Pages/vistaInicio.php" target="_parent">Cerrar Sesion</a><br><br>
<table border="1" width="100%">

        <tr>
            <td><a href="/futonline/Controller/controladorClientes.php" target="fPagina">Clientes</a></td>
            
        </tr>

</table>