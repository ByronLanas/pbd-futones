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

$cuentas=$_SESSION["cuentas"];
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<body style="background-color:#0A8A9A; font: Helvetica 12pt;">
    
    <br>
    <div align="center" font="Arial 24pt"><strong>Listado cuentas de acceso</strong></div><br>

    <table align="center" border="1">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Tipo</th>
                <th colspan="2">
                
                </th>
                </tr>
        </thead>
        <tbody>
            <?php
            if(isset($cuentas))foreach($cuentas as $cuenta){
?>
            <tr>
                    <form name="modificar" id="modificar" action="/futonline/Controller/controladorCuentasModificar.php" method="POST">
                    <td><input type="text" name="USU_EMP" value="<?php echo $cuenta['USU_EMP']?>" readonly="readonly" /></td>
                    <td><select name="TIP_EMP" >
                        <?php if ($cuenta['TIP_EMP']=="administrador"){ ?>
                                    <option>administrador</option>
                                    <option>empleado</option>
                        <?php } else { ?>
                                    <option>empleado</option>
                                    <option>administrador</option>
                        <?php }?>
                                </select></td>
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="/futonline/Controller/controladorCuentasEliminar.php" method="POST">
                    <input type="hidden" name="USU_EMP" value="<?php echo $cuenta['USU_EMP']?>" />
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="/futonline/Controller/controladorCuentasAgregar.php" method="POST">
                    <td><input type="text" name="USU_EMP"  /></td>
                    <td><select name="TIP_EMP" >
                                    <option>administrador</option>
                                    <option>empleado</option>
                                </select></td>
                    
                    <td colspan="2"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>
    