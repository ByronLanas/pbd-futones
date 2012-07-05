<?php 
header( 'Content-Type: text/html;charset=utf-8' );  
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">

<body style="background-color:#F9BD0F; font: Helvetica 12pt;">
<?php
session_start();
$usuario=$_SESSION["usuario"];

if ($usuario==""){
    
    ?><body>
<script type="text/javascript">
window.location="/futonline/View/Pages/vistaInicio.php";
</script>
</body><?php
    
    }
 

?>

<a href="vistaDatosUsuario.php" target="fPagina"> <?php echo $usuario;?></a><br>
<a href="/futonline/View/Pages/vistaInicio.php" target="_parent">Cerrar Sesion</a><br><br>
<table border="1" width="100%">

        <tr>
            <td><a href="/futonline/View/Pages/vistaCatalogo.php" target="fPagina">Catálogo</a></td>
            
        </tr>
        <tr>
            <td><a href="/futonline/Controller/controladorPedido.php" target="fPagina">Revisar Pedidos</a></td>  
        </tr>
</table>


