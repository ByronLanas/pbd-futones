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

$nombre = $_SESSION["nombre"];
$pedidos = $_SESSION["pedidos"]
?>
<body style="background-color:#0A8A9A; font: Helvetica 12pt;"> Pedidos del cliente: <?php echo $nombre;?> <br><br>
<form name="cancelar" id="cancelar" action="../Controller/controladorCancelarPedido.php" method="POST">
<table BGCOLOR ="#FFFFFF" border="1">
        <tr>
        <td width =75><div align="center">Estado</div></td>
            <td><div align="center">Fecha de Ingreso</div></td>
            <td><div align="center">Monto Total</div></td>
            <td><div align="center">Tiempo Produccion</div></td>
            <td><div align="center">Cancelar Pedido</div></td>
        </tr>
        <?php
        $disc='ingresado';
        for($i=0;$i<4;$i++){
	if(isset($pedidos))foreach($pedidos as $pedido)
	{  
            if($pedido['EST_PED']==$disc){
	?>
	<tr>
            <td><div align="center"><?php echo $pedido['EST_PED']?></div></td>
            <td><div align="center"><?php echo $pedido['FEC_PED']?></div></td>
            <td><div align="center"><?php echo $pedido['MONT_PED']?></div></td>
            <td><div align="center"><?php echo $pedido['TIEM_PED']?></div></td>
            <?php if($pedido['EST_PED']=='ingresado') {?><td><div align="center"><input type="checkbox" name="id_pedido[]" id ="id_pedido" value="<?php echo $pedido['COD_PED']?>"/></div>
                <?php }else{?>
            <td><div align="center"><input type="checkbox" name="cancelar" value="OFF" disabled="disabled" /></div></td>
                <?php }
                ?>
        </tr>
        
        <?php
            }
        }
            switch ($i){
                case(0): $disc='despachado';break;
                case(1): $disc='terminado';break;
                case(2): $disc='cancelado';break;
            }
         
        }
        ?>
        <tr><td colspan="5">
        <input type="submit" value="Cancelar" />
	</tr></td>
</table></form>


	        


