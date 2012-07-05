<?php
//session_start();
$nombre = $_SESSION["nombre"];
$pedidos = $_SESSION["pedidos"]
?>
<body> Pedidos del usuario: <?php echo $nombre;?> <br><br></body>
<table border="1">
        <tr>
            <td>Estado</td>
            <td>Fecha</td>
        </tr>
        <?php
	foreach($pedidos as $pedido)
	{
	?>
	<tr>
		<td><?php echo $pedido['EST_PED']?></td>
		<td><?php echo $pedido['FEC_PED']?></td>
	</tr>
	<?php
	}
	?>
</table>


	        


