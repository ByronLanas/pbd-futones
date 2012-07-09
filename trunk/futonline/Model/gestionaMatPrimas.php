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
class gestionaMatPrimas{
    
    var $link;
    public function gestionaMatPrimas(){
      $dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      //$dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
      
    }
    public function listarMatPrimas(){
                    
        $sql = "select * from ALGODON";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $algodones[]=$aux;
        
        $sql = "select * from CIERRE";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $cierres[]=$aux;
        
        $sql = "select * from ESPUMA";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $espumas[]=$aux;
        
        $sql = "select * from HILO";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $hilos[]=$aux;
        
        $sql = "select * from MADERA";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $maderas[]=$aux;
        
        $sql = "select T.ID_MAT,CANT_MAT, CANT_MIN_MAT, ANC_TEL,MAT_TEL,c.COL_COL,CANT_COL from TELA t join COLOR c on (t.ID_MAT=c.ID_MAT) order by (MAT_TEL); ";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $telas[]=$aux;
        
        return array( 'algodones'=> $algodones , $hilos , $maderas , $cierres ,"espumas"=> $espumas);

    }
    public function eliminarMatPrimas($USU_EMP){
                    
        $sql = "delete from EMPLEADO where USU_EMP='$USU_EMP'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        $sql = "select USU_EMP, TIP_EMP from EMPLEADO";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $matPrimas[]=$aux;
        return $matPrimas ;

    }    
    public function modificarMatPrimas($USU_EMP, $TIP_EMP){
                    
        $sql = "update EMPLEADO set TIP_EMP='$TIP_EMP' where USU_EMP='$USU_EMP'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        $sql = "select USU_EMP, TIP_EMP from EMPLEADO";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $matPrimas[]=$aux;
        return $matPrimas;

    }    
    public function agregarMatPrimas($USU_EMP,  $TIP_EMP){
        
        $pass =rand(100, 999);
        
        $sql = "insert into EMPLEADO (USU_EMP, TIP_EMP, PASS_EMP) VALUES('$USU_EMP', '$TIP_EMP','$USU_EMP+$pass')";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        $sql = "select * from EMPLEADO";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $matPrimas[]=$aux;
        return $matPrimas;
        $pass =rand(100, 999);
    }    
}
?>