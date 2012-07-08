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

?><?php 
header( 'Content-Type: text/html;charset=utf-8' );  

$productos=$_SESSION["productos"];
?>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<body style="background-color:#0A8A9A; font: Helvetica 12pt;">

    <table border="1">
        <thead>
            <tr>
                <th>codigo</th>
                <th>nombre</th>
                <th>descripcion</th>
                <th>precio</th>
                </tr>
        </thead>
        <tbody>
            <?php
            if(isset($productos))foreach($productos as $producto){
?>
                <tr>
                    <td><?php echo $producto['COD_PROD']?></td>
                    <td><?php echo $producto['NOM_PROD']?></td>
                    <td><?php echo $producto['DESC_PROD']?></td>
                    <td><?php echo $producto['PREC_PROD']?></td>
                </tr>
                <?php
            }?>
        </tbody>
    </table>


