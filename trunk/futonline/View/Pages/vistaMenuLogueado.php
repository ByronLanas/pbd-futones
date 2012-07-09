<?php 
header( 'Content-Type: text/html;charset=utf-8' );  
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<style>
    .button {
   border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
   background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
   background: -ms-linear-gradient(top, #3e779d, #65a9d7);
   background: -o-linear-gradient(top, #3e779d, #65a9d7);
   padding: 4.5px 9px;
   -webkit-border-radius: 40px;
   -moz-border-radius: 40px;
   border-radius: 40px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 13px;
   font-family: Helvetica, Arial, Sans-Serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border-top-color: #28597a;
   background: #28597a;
   color: #ccc;
   }
.button:active {
   border-top-color: #1b435e;
   background: #1b435e;
   }
</style>

<body style="background-color:#F9BD0F; font: Helvetica 12pt;">
<?php
session_start();


if (!isset($_SESSION["usuario"])){
    
    ?><body>
<script type="text/javascript">
top.location="/futonline/View/Pages/vistaInicio.php";
</script>
</body><?php
    
    }
 $usuario=$_SESSION["usuario"];

?>

<div id="button-user"><a class="button" href="/futonline/Controller/controladorDatosUsuario.php?accion=obtener" target="fPagina" title="Tu perfil"> <?php echo $usuario;?></a>
<a href="../../Controller/controladorPrincipal.php" target="_parent" style ="font-size: 7pt;"> cerrar sesion</a></div><br><br>
<table border="1" width="100%">

        <tr>
            <td><a href="/futonline/View/Pages/vistaCatalogo.php" target="fPagina">Catálogo</a></td>
            
        </tr>
        <tr>
            <td><a href="/futonline/Controller/controladorPedidoIngresado.php" target="fPagina">Revisar Pedidos</a></td>  
        </tr>
</table>


