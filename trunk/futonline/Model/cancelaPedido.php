<?php
        
class cancelaPedido{
    
    var $link;
    public function cancelaPedido(){
      //$dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
      
    }
    public function cancelar_pedido($pedido){  
        $sql = "UPDATE pedido SET est_ped='cancelado' WHERE cod_ped='$pedido'";
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));     
}   
}
?>