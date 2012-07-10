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
class ingresaProducto{
    var $link;
    public function ingresaProducto(){
        //$dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
    }
    
    
    public function ingresarProducto($NOM_PROD,  $PRE_PROD,$DES_PROD,$TIP_PROD,$FOTO_PROD,$TIEM_PROD){

        
        $sql = "insert into PRODUCTO (NOM_PROD,PRE_PROD,DES_PROD,TIP_PROD,FOTO_PROD,TIEM_PROD) VALUES('$NOM_PROD',  '$PRE_PROD','$DES_PROD','$TIP_PROD','$FOTO_PROD','$TIEM_PROD')";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));

    }    
}
?>