<?php
class muestraProducto{
    
    var $link;
    public function muestraProducto(){
      $dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      //$dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
      
    }
    public function tipoProducto($tipoProducto){
                    
        $sql = "select * from PRODUCTO where TIP_PROD= '$tipoProducto'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        while($productos=odbc_fetch_array($result))
        //$productos= odbc_result_all($result);
        return $productos;
       /* while(odbc_fetch_row($result) ) {
            $productos= odbc_result($result, "CLI_RUT");
            
            
            }

               return -1;//usuario no existe*/
    }
}
?>