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
<?php
    header( 'Content-Type: text/html;charset=utf-8' );  

    
?>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<body style="background-color:#0A8A9A; font: Helvetica 12pt;">

   
    
    <form name="datos" action="../Controller/controladorIngresarProducto.php" method="POST">
        <table border="0">
                <tbody>
                    <tr>
                        <td>Nombre Producto: </td>
                        <td><input type="text" size="50" name="nombre"/></td>
                    </tr>
                    <tr>
                        <td>Precio: </td>
                        <td><input type="text" size="50" name="precio"/></td>
                    </tr>
                    <tr>
                        <td>Descripción: </td>
                        <td><input type="text" size="50" name="descripcion"/></td>
                    </tr>
                    <tr>
                        <td>Tipo: </td>
                        <td><input type="text" size="50" name="tipo"/></td>
                    </tr>
                    <tr>
                        <td>Foto: </td>
                        <td><input type="text" size="50" name="foto"/></td>
                    </tr>
                    <tr>
                        <td>Tiempo elaboración: </td>
                        <td><input type="text" size="50" name="tiempo"/></td>
                    </tr>
                    <tr>
                        <td>Ingresar</td>
                        <td align="center"><input type="submit" value="ingresar" /></td>
                    </tr>
                </tbody>
            </table>
</form>
    					
    
    