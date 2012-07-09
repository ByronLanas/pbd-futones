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
        
class muestraPedidoCanceladoAE{
    
    var $link;
    public function muestraPedidoCanceladoAE(){
      //$dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
      
    }
    public function consultar_pedidoCanceladoAE(){        
        
        
        $sql = "SELECT CLI_NOM,c.CLI_RUT, CONVERT(char(8),FEC_PED,103) as FEC_PED,EST_PED
      ,MONT_PED,TIEM_PED,COD_PED FROM pedido as p,cliente as c WHERE p.cli_rut=c.cli_rut and p.est_ped = 'cancelado' ORDER BY fec_ped";
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        while($aux=odbc_fetch_array($result))
            $pedidos[]=$aux;
        return $pedidos;
        
}   
}
?>