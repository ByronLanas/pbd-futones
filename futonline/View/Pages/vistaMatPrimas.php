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

$espumas=$_SESSION["espumas"];
$algodones=$_SESSION["algodones"];
$telas=$_SESSION["telas"];
$maderas=$_SESSION["maderas"];
$hilos=$_SESSION["hilos"];
$cierres=$_SESSION["cierres"];
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<body style="background-color:#0A8A9A; font: Helvetica 12pt;">
    
    <br>
    <div align="center" font="Arial 24pt"><strong>Algodones</strong></div><br>
    

    <table align="center" border="1">
        <thead>
            <tr>
                <th>Cantidad disponible</th>
                <th>Cantidad minima</th>
                <th>Calidad algodon</th>
                <th colspan="2">
                
                </th>
                </tr>
        </thead>
        <tbody>
            <?php
            if(isset($algodones))foreach($algodones as $algodon){
?>
            <tr>
                    <form name="modificar" id="modificar" action="/futonline/Controller/controladorMatPrimasModificar.php" method="POST">
                        <input type="hidden" name="ID_MAT" value="<?php echo $algodon["ID_MAT"]; ?>" />
                        <td><input type="text" name="CANT_MAT" value="<?php echo $algodon["CANT_MAT"]; ?>" /></td>
                        <td><?php echo $algodon["CANT_MIN_MAT"]; ?></td>
                        <td><?php echo $algodon["CAL_ALG"]; ?></td>
                        <input type="hidden" name="TIP_MAT" value="algodon" />
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="/futonline/Controller/controladorMatPrimasEliminar.php" method="POST">
                    <input type="hidden" name="ID_MAT" value="<?php echo $algodon["ID_MAT"]; ?>" />
                    <input type="hidden" name="TIP_MAT" value="algodon" />
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="/futonline/Controller/controladorMatPrimasAgregar.php" method="POST">
                    <td><input type="text" name="CANT_MAT"  /></td>
                    <td><input type="text" name="CANT_MIN_MAT"  /></td>
                    <td><input type="text" name="CAL_ALG"  /></td>
                    <input type="hidden" name="TIP_MAT" value="algodon" />             
                    
                    <td colspan="3"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>
    <br>
    
    <div align="center" font="Arial 24pt"><strong>Espumas</strong></div><br>
    
    <table align="center" border="1">
        <thead>
            <tr>
                <th>Cantidad disponible</th>
                <th>Cantidad minima</th>
                <th>Densidad</th>
                <th>Grosor</th>
                <th colspan="2">
                
                </th>
                </tr>
        </thead>
        <tbody>
            <?php
            if(isset($espumas))foreach($espumas as $espuma){
?>
            <tr>
                    <form name="modificar" id="modificar" action="/futonline/Controller/controladorMatPrimasModificar.php" method="POST">
                        <input type="hidden" name="ID_MAT" value="<?php echo $espuma["ID_MAT"]; ?>" />
                        <td><input type="text" name="CANT_MAT" value="<?php echo $espuma["CANT_MAT"]; ?>" /></td>
                        <td><?php echo $espuma["CANT_MIN_MAT"]; ?></td>
                        <td><?php echo $espuma["DEN_ESP"]; ?></td>
                        <td><?php echo $espuma["GRO_ESP"]; ?></td>
                        <input type="hidden" name="TIP_MAT" value="espuma" />
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="/futonline/Controller/controladorMatPrimasEliminar.php" method="POST">
                    <input type="hidden" name="ID_MAT" value="<?php echo $espuma["ID_MAT"]; ?>" />
                    <input type="hidden" name="TIP_MAT" value="espuma" />
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="/futonline/Controller/controladorMatPrimasAgregar.php" method="POST">
                    <td><input type="text" name="CANT_MAT"  /></td>
                    <td><input type="text" name="CANT_MIN_MAT"  /></td>
                    <td><input type="text" name="DEN_ESP"  /></td>
                    <td><input type="text" name="GRO_ESP"  /></td>
                    <input type="hidden" name="TIP_MAT" value="espuma" />             
                    
                    <td colspan="4"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>
    <br>
    
    <div align="center" font="Arial 24pt"><strong>Cierres</strong></div><br>
    
    <table align="center" border="1">
        <thead>
            <tr>
                <th>Cantidad disponible</th>
                <th>Cantidad minima</th>
                <th>Largo</th>
                <th>Ancho</th>
                <th>Color</th>
                <th colspan="2">
                
                </th>
                </tr>
        </thead>
        <tbody>
            <?php
            if(isset($cierres))foreach($cierres as $cierre){
?>
            <tr>
                    <form name="modificar" id="modificar" action="/futonline/Controller/controladorMatPrimasModificar.php" method="POST">
                        <input type="hidden" name="ID_MAT" value="<?php echo $cierre["ID_MAT"]; ?>" />
                        <td><input type="text" name="CANT_MAT" value="<?php echo $cierre["CANT_MAT"]; ?>" /></td>
                        <td><?php echo $cierre["CANT_MIN_MAT"]; ?></td>
                        <td><?php echo $cierre["LAR_CIE"]; ?></td>
                        <td><?php echo $cierre["ANC_CIE"]; ?></td>
                        <td><?php echo $cierre["COL_CIE"]; ?></td>
                        <input type="hidden" name="TIP_MAT" value="cierre" />
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="/futonline/Controller/controladorMatPrimasEliminar.php" method="POST">
                    <input type="hidden" name="ID_MAT" value="<?php echo $cierre["ID_MAT"]; ?>" />
                    <input type="hidden" name="TIP_MAT" value="cierre" />
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="/futonline/Controller/controladorMatPrimasAgregar.php" method="POST">
                    <td><input type="text" name="CANT_MAT"  /></td>
                    <td><input type="text" name="CANT_MIN_MAT"  /></td>
                    <td><input type="text" name="LAR_CIE"  /></td>
                    <td><input type="text" name="ANC_CIE"  /></td>
                    <td><input type="text" name="COL_CIE"  /></td>
                    <input type="hidden" name="TIP_MAT" value="cierre" />             
                    
                    <td colspan="4"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>
    <br>
    
    <div align="center" font="Arial 24pt"><strong>Hilos</strong></div><br>
    
    <table align="center" border="1">
        <thead>
            <tr>
                <th>Cantidad disponible</th>
                <th>Cantidad minima</th>
                <th>Espesor</th>
                <th>Color</th>
                <th colspan="2">
                
                </th>
                </tr>
        </thead>
        <tbody>
            <?php
            if(isset($hilos))foreach($hilos as $hilo){
?>
            <tr>
                    <form name="modificar" id="modificar" action="/futonline/Controller/controladorMatPrimasModificar.php" method="POST">
                        <input type="hidden" name="ID_MAT" value="<?php echo $hilo["ID_MAT"]; ?>" />
                        <td><input type="text" name="CANT_MAT" value="<?php echo $hilo["CANT_MAT"]; ?>" /></td>
                        <td><?php echo $hilo["CANT_MIN_MAT"]; ?></td>
                        <td><?php echo $hilo["HIL_ESP"]; ?></td>
                        <td><?php echo $hilo["HIL_COL"]; ?></td>
                        <input type="hidden" name="TIP_MAT" value="hilo" />
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="/futonline/Controller/controladorMatPrimasEliminar.php" method="POST">
                    <input type="hidden" name="ID_MAT" value="<?php echo $hilo["ID_MAT"]; ?>" />
                    <input type="hidden" name="TIP_MAT" value="hilo" />
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="/futonline/Controller/controladorMatPrimasAgregar.php" method="POST">
                    <td><input type="text" name="CANT_MAT"  /></td>
                    <td><input type="text" name="CANT_MIN_MAT"  /></td>
                    <td><input type="text" name="HIL_ESP"  /></td>
                    <td><input type="text" name="HIL_COL"  /></td>
                    <input type="hidden" name="TIP_MAT" value="hilo" />             
                    
                    <td colspan="4"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>
    <br>
    
    <div align="center" font="Arial 24pt"><strong>Maderas</strong></div><br>
    
    <table align="center" border="1">
        <thead>
            <tr>
                <th>Cantidad disponible</th>
                <th>Cantidad minima</th>
                <th>Tipo</th>
                <th>Largo</th>
                <th>Ancho</th>
                <th>Alto</th>
                <th colspan="2">
                
                </th>
                </tr>
        </thead>
        <tbody>
            <?php
            if(isset($maderas))foreach($maderas as $madera){
?>
            <tr>
                    <form name="modificar" id="modificar" action="/futonline/Controller/controladorMatPrimasModificar.php" method="POST">
                        <input type="hidden" name="ID_MAT" value="<?php echo $madera["ID_MAT"]; ?>" />
                        <td><input type="text" name="CANT_MAT" value="<?php echo $madera["CANT_MAT"]; ?>" /></td>
                        <td><?php echo $madera["CANT_MIN_MAT"]; ?></td>
                        <td><?php echo $madera["TIP_MAD"]; ?></td>
                        <td><?php echo $madera["LAR_MAD"]; ?></td>
                        <td><?php echo $madera["ANC_MAD"]; ?></td>
                        <td><?php echo $madera["ALT_MAD"]; ?></td>
                        <input type="hidden" name="TIP_MAT" value="madera" />
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="/futonline/Controller/controladorMatPrimasEliminar.php" method="POST">
                    <input type="hidden" name="ID_MAT" value="<?php echo $madera["ID_MAT"]; ?>" />
                    <input type="hidden" name="TIP_MAT" value="madera" />
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="/futonline/Controller/controladorMatPrimasAgregar.php" method="POST">
                    <td><input type="text" name="CANT_MAT"  /></td>
                    <td><input type="text" name="CANT_MIN_MAT"  /></td>
                    <td><input type="text" name="TIP_MAD"  /></td>
                    <td><input type="text" name="LAR_MAD"  /></td>
                    <td><input type="text" name="ANC_MAD"  /></td>
                    <td><input type="text" name="ALT_MAD"  /></td>
                    <input type="hidden" name="TIP_MAT" value="madera" />             
                    
                    <td colspan="4"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>
    <br>
    
    <div align="center" font="Arial 24pt"><strong>Telas</strong></div><br>
    
    <table align="center" border="1">
        <thead>
            <tr>
                <th>Cantidad</th>
                <th>Cantidad minima</th>
                <th>Ancho</th>
                <th>Material</th>
                <th>Color</th>
                <th colspan="2">
                
                </th>
                </tr>
        </thead>
        <tbody>
            <?php
            if(isset($telas))foreach($telas as $tela){
?>
            <tr>
                    <form name="modificar" id="modificar" action="/futonline/Controller/controladorMatPrimasModificar.php" method="POST">
                        <input type="hidden" name="ID_MAT" value="<?php echo $tela["ID_MAT"]; ?>" />
                        <td><input type="text" name="CANT_COL" value="<?php echo $tela["CANT_COL"]; ?>" /></td>
                        <td><?php echo $tela["CANT_MIN_MAT"]; ?></td>
                        <td><?php echo $tela["ANC_TEL"]; ?></td>
                        <td><?php echo $tela["MAT_TEL"]; ?></td>
                        <td><?php echo $tela["COL_COL"]; ?></td>
                        <input type="hidden" name="COL_COL" value="<?php echo $tela["COL_COL"]; ?>" />
                        <input type="hidden" name="TIP_MAT" value="tela" />
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="/futonline/Controller/controladorMatPrimasEliminar.php" method="POST">
                    <input type="hidden" name="ID_MAT" value="<?php echo $tela["ID_MAT"]; ?>" />
                    <input type="hidden" name="COL_COL" value="<?php echo $tela["COL_COL"]; ?>" />
                    <input type="hidden" name="TIP_MAT" value="tela" />
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="/futonline/Controller/controladorMatPrimasAgregar.php" method="POST">
                    <td><input type="text" name="CANT_COL"  /></td>
                    <td><input type="text" name="CANT_MIN_MAT"  /></td>
                    <td><input type="text" name="ANC_TEL"  /></td>
                    <td><input type="text" name="MAT_TEL"  /></td>
                    <td><input type="text" name="COL_COL"  /></td>
                    <input type="hidden" name="TIP_MAT" value="tela" />             
                    
                    <td colspan="4"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>