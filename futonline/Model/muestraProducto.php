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
        
        while($aux=odbc_fetch_array($result))
            $productos[]=$aux;
        return $productos;

    }
    
    public function agregarProducto($NOM_PROD,$DESC_PROD,$PREC_PROD,$TIP_PROD){
        
        
        $sql = "insert into Producto (NOM_PROD,DESC_PROD,PREC_PROD,TIP_PROD,CANT_PROD) VALUES('$NOM_PROD','$DESC_PROD','$PREC_PROD','$TIP_PROD',0)";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        

    } 
    
}
?>