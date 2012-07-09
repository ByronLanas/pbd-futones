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
class manejoDeDatos{
    
    var $link;
    public function manejoDeDatos(){
      //$dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
      
    }
    public function modificaC($usuario,$nom,$tel,$mail,$pass,$dir){
                    
        $sql = "update CLIENTE set CLI_NOM = '$nom',CLI_DIR= '$dir',CLI_TEL='$tel',CLI_PASS='$pass',CLI_MAIL='$mail' where CLI_RUT='$usuario';";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        

    }
    
    public function modificaE($usuario,$pass){
                    
        $sql = "update EMPLEADO set PASS_EMP = '$pass' where USU_EMP='$usuario';";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        

    }
    public function modificaA($usuario,$pass,$tipo){
                    
        $sql = "update EMPLEADO set PASS_EMP = '$pass',TIP_EMP='$tipo' where USU_EMP='$usuario';";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        

    }
    
    public function obtiene($usuario){
                    
        $sql = "select * from CLIENTE where CLI_RUT= '$usuario'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        if(odbc_fetch_row($result)!=NULL){
            $sql = "select * from CLIENTE where CLI_RUT= '$usuario'";
            
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));            
            return odbc_fetch_array($result);
        }  else {
            
            $sql = "select * from EMPLEADO where USU_EMP= '$usuario'";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            return odbc_fetch_array($result);
        }
    }
}
?>
