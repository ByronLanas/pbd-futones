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
class gestionaCuentas{
    
    var $link;
    public function gestionaCuentas(){
      //$dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
      
    }
    public function listarCuentas(){
                    
        $sql = "select USU_EMP, TIP_EMP from EMPLEADO";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $cuentas[]=$aux;
        return $cuentas;

    }
    public function eliminarCuentas($USU_EMP){
                    
        $sql = "delete from EMPLEADO where USU_EMP='$USU_EMP'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        $sql = "select USU_EMP, TIP_EMP from EMPLEADO";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $cuentas[]=$aux;
        return $cuentas;

    }    
    public function modificarCuentas($USU_EMP, $TIP_EMP){
                    
        $sql = "update EMPLEADO set TIP_EMP='$TIP_EMP' where USU_EMP='$USU_EMP'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        $sql = "select USU_EMP, TIP_EMP from EMPLEADO";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $cuentas[]=$aux;
        return $cuentas;

    }    
    public function agregarCuentas($USU_EMP,  $TIP_EMP){
        
        $pass =rand(100, 999);
        
        $sql = "insert into EMPLEADO (USU_EMP, TIP_EMP, PASS_EMP) VALUES('$USU_EMP', '$TIP_EMP','$USU_EMP+$pass')";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        $sql = "select * from EMPLEADO";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $cuentas[]=$aux;
        return $cuentas;
        $pass =rand(100, 999);
    }    
}
?>