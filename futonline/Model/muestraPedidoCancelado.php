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
        
class muestraPedidoCancelado{
    
    var $link;
    public function muestraPedidoCancelado(){
      $dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      //$dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
      
    }
    public function consultar_pedidoCancelado($usuario){        
        $sql = "SELECT cli_nom FROM cliente WHERE cli_rut='$usuario'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        $nombre = odbc_result($result,"CLI_NOM");
        $_SESSION["nombre"]=$nombre;
        $sql = "SELECT CLI_RUT, CONVERT(char(8),FEC_PED,103) as FEC_PED,EST_PED
      ,MONT_PED,TIEM_PED,COD_PED FROM pedido WHERE cli_rut='$usuario' and est_ped = 'cancelado' ORDER BY fec_ped";
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        while($aux=odbc_fetch_array($result))
            $pedidos[]=$aux;
        return $pedidos;
        
}   
}
?>