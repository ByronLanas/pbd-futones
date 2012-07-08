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
window.location="/futonline/View/Pages/vistaInicio.php";
</script>


</body>

    
    <?php
    
    }
    
    
   
 $usuario=$_SESSION["usuario"];

?><?php 
header( 'Content-Type: text/html;charset=utf-8' );  

$clientes=$_SESSION["clientes"];
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<body style="background-color:#0A8A9A; font: Helvetica 12pt;">
    
    <br>
    <div align="center" font="Arial 24pt"><strong>Listado clientes</strong></div><br>

    <table align="center" border="1">
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Mail</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th colspan="5">
                
                </th>
                </tr>
        </thead>
        <tbody>
            <?php
            if(isset($clientes))foreach($clientes as $cliente){
?>
            <tr>
                    <form name="modificar" id="modificar" action="../../Controller/controladorClientesModificar.php" method="POST">
                    <td><input type="text" name="CLI_RUT" value="<?php echo $cliente['CLI_RUT']?>" readonly="readonly" /></td>
                    <td><input type="text" name="CLI_NOM" value="<?php echo $cliente['CLI_NOM']?>" /></td>
                    <td><input type="text" name="CLI_MAIL" value="<?php echo $cliente['CLI_MAIL']?>" /></td>
                    <td><input type="text" name="CLI_TEL" value="<?php echo $cliente['CLI_TEL']?>" /></td>
                    <td><input type="text" name="CLI_DIR" value="<?php echo $cliente['CLI_DIR']?>" /></td>
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="../../Controller/controladorClientesEliminar.php" method="POST">
                    <input type="hidden" name="CLI_RUT" value="<?php echo $cliente['CLI_RUT']?>" />
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="../../Controller/controladorClientesAgregar.php" method="POST">
                    <td><input type="text" name="CLI_RUT" value="" /></td>
                    <td><input type="text" name="CLI_NOM" value="" /></td>
                    <td><input type="text" name="CLI_MAIL" value="" /></td>
                    <td><input type="text" name="CLI_TEL" value="" /></td>
                    <td><input type="text" name="CLI_DIR" value="" /></td>
                    
                    <td colspan="2"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>
    