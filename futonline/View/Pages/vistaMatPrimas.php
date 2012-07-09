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
    <div align="center" font="Arial 24pt"><strong>Listado materias primas</strong></div><br>

    <table align="center" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cantidad disponible</th>
                <th>Cantidad minima</th>
                <th>Calididad algodon</th>
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
                        <td><?php echo $algodon["ID_MAT"]; ?></td>
                        <td><?php echo $algodon["CANT_MAT"]; ?></td>
                        <td><?php echo $algodon["CANT_MAT_MIN"]; ?></td>
                        <td><?php echo $algodon["CAL_ALG"]; ?></td>
                    <td></td>
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="/futonline/Controller/controladorMat_PrimasEliminar.php" method="POST">
                    
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="/futonline/Controller/controladorMatPrimasAgregar.php" method="POST">
                    <td><input type="text" name="ID_MAT"  /></td>
                    <td><input type="text" name="CANT_MAT"  /></td>
                    <td><input type="text" name="CANT_MIN_MAT"  /></td>
                    <td><input type="text" name="CAL_ALG"  /></td>
                    <input type="hidden" name="TIP_MAT" value="algodon" />             
                    
                    <td colspan="2"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>
    <br><br>
    <table align="center" border="1">
        <thead>
            <tr>
                <th>ID</th>
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
                        <td><?php echo $espuma["ID_MAT"]; ?></td>
                        <td><?php echo $espuma["CANT_MAT"]; ?></td>
                        <td><?php echo $espuma["CANT_MAT_MIN"]; ?></td>
                        <td><?php echo $espuma["DEN_ESP"]; ?></td>
                        <td><?php echo $espuma["GRO_ESP"]; ?></td>
                    <td></td>
                    <td><input type="submit" value="Modificar" /></td>
                    </form>
                    <form name="eliminar" action="/futonline/Controller/controladorMat_PrimasEliminar.php" method="POST">
                    
                    <td><input type="submit" value="Eliminar" /></td>
                    
                    </form>
                </tr>
                <?php
            }?>
                <form name="agregar" id="agregar" action="/futonline/Controller/controladorMatPrimasAgregar.php" method="POST">
                    <td><input type="text" name="ID_MAT"  /></td>
                    <td><input type="text" name="CANT_MAT"  /></td>
                    <td><input type="text" name="CANT_MIN_MAT"  /></td>
                    <td><input type="text" name="DEN_ESP"  /></td>
                    <td><input type="text" name="GRO_ESP"  /></td>
                    <input type="hidden" name="TIP_MAT" value="espuma" />             
                    
                    <td colspan="2"><input type="submit" value="agregar" /></td>
                    </form>

                    
        
        </tbody>
    </table>