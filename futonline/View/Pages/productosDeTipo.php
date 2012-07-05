<?php 
header( 'Content-Type: text/html;charset=utf-8' );  
session_start();
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
            
?>
                <tr>
                    <td><?php echo $productos['COD_PROD']?></td>
                    <td><?php echo $productos['NOM_PROD']?></td>
                    <td><?php echo $productos['DESC_PROD']?></td>
                    <td><?php echo $productos['PREC_PROD']?></td>
                </tr>
               
            
        </tbody>
    </table>


