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
class gestionaProveedores{
    
    var $link;
    public function gestionaProveedores(){
      $dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      //$dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
      
    }
    public function listarProveedores(){
                    
        $sql = "select * from Proveedores";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $proveedores[]=$aux;
        return $proveedores;

    }
    public function eliminarProveedores($RUT_PROV){
                    
        $sql = "delete from Proveedores where RUT_PROV='$RUT_PROV'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        

        


    }    
    public function modificarProveedores($RUT_PROV,$NOM_PROV,$DIR_PROV,$TEL_PROV,$MAIL_PROV){
                    
        $sql = "update proveedores set NOM_PROV='$NOM_PROV', DIR_PROV='$DIR_PROV',TEL_PROV='$TEL_PROV',MAIL_PROV='$MAIL_PROV' where RUT_PROV='$RUT_PROV'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        


    }    
    public function agregarProveedores($RUT_PROV,$NOM_PROV,$DIR_PROV,$TEL_PROV,$mail){
        
        
        $sql = "insert into Proveedores (RUT_PROV,NOM_PROV,DIR_PROV,TEL_PROV,MAIL_PROV) VALUES('$RUT_PROV','$NOM_PROV','$DIR_PROV','$TEL_PROV','$mail')";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        

    }    
}
?>