<?php /*<script type="text/javascript">
    if(document.location==top.location){
    document.location="/futonline/View/Pages/vistaInicio.php";
    }
</script>*/?>

<?php
session_start();


if (!isset($_SESSION["usuario"])){
    
    ?><body >
<script type="text/javascript">
top.location="/futonline/View/Pages/vistaInicio.php";
</script>


</body>

    
    <?php
    
    }
    
    
   
 $usuario=$_SESSION["usuario"];

?><?php 
header( 'Content-Type: text/html;charset=utf-8' );  

$proveedores=$_SESSION["proveedores"];
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<body style="background-color:#0A8A9A; font: Helvetica 12pt;">
    
    <br>
    <div align="center" font="Arial 24pt"><strong>Listado Proveedores</strong></div><br>

    <table align="center" border="1">
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Direccion</th>
                <th>Mail</th>
                <th colspan="2">
                
                </th>
                </tr>
        </thead>
        <tbody>
            <?php
            if(isset($proveedores))foreach($proveedores as $proveedor){
?>
            <tr>
                    <form name="modificar" id="modificar" action="/futonline/Controller/controladorProveedoresModificar.php" method="POST">
                    <td><?php echo $proveedor['RUT_PROV']?></td>
                    <td><input type="text" name="NOM_PROV" value="<?php echo $proveedor['NOM_PROV']?>" /></td>
                    <td><input type="text" name="TEL_PROV" value="<?php echo $proveedor['TEL_PROV']?>" /></td>
                    <td><input type="text" name="DIR_PROV" value="<?php echo $proveedor['DIR_PROV']?>" /></td>
                    <td><input type="text" name="MAIL_PROV" value="<?php echo $proveedor['MAIL_PROV']?>" /></td>
                    <input type="hidden" name="RUT_PROV" value="<?php echo $proveedor['RUT_PROV']?>" />
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="/futonline/Controller/controladorProveedoresEliminar.php" method="POST">
                    <input type="hidden" name="RUT_PROV" value="<?php echo $proveedor['RUT_PROV']?>" />
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="/futonline/Controller/controladorProveedoresAgregar.php" method="POST">
                    <td><input type="text" name="RUT_PROV" value="" /></td>
                    <td><input type="text" name="NOM_PROV" value="" /></td>
                    <td><input type="text" name="TEL_PROV" value="" /></td>
                    <td><input type="text" name="DIR_PROV" value="" /></td>
                    <td><input type="text" name="MAIL_PROV" value="" /></td>
                    
                    <td colspan="2"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>
    