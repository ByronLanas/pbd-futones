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
class gestionaClientes{
    
    var $link;
    public function gestionaClientes(){
      $dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      //$dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
      
    }
    public function listarClientes(){
                    
        $sql = "select CLI_RUT, CLI_NOM, CLI_DIR, CLI_MAIL, CLI_TEL from CLIENTE";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $clientes[]=$aux;
        return $clientes;

    }
    public function eliminarClientes($cliente){
                    
        $sql = "delete from CLIENTE where CLI_RUT='$cliente'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        $sql = "select CLI_RUT, CLI_NOM, CLI_DIR, CLI_MAIL, CLI_TEL from CLIENTE";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $clientes[]=$aux;
        return $clientes;

    }    
    public function modificarClientes($CLI_RUT, $CLI_NOM, $CLI_TEL, $CLI_MAIL, $CLI_DIR){
                    
        $sql = "update CLIENTE set CLI_NOM='$CLI_NOM',CLI_TEL='$CLI_TEL', CLI_MAIL='$CLI_MAIL', CLI_DIR='$CLI_DIR'  where CLI_RUT='$CLI_RUT'";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        $sql = "select CLI_RUT, CLI_NOM, CLI_DIR, CLI_MAIL, CLI_TEL from CLIENTE";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $clientes[]=$aux;
        return $clientes;

    }    
    public function agregarClientes($CLI_RUT, $CLI_NOM, $CLI_TEL, $CLI_MAIL, $CLI_DIR){
        
        $pass =rand(100, 999);
        
        $sql = "insert into CLIENTE (CLI_RUT, CLI_NOM, CLI_TEL, CLI_MAIL, CLI_DIR, CLI_PASS) VALUES('$CLI_RUT', '$CLI_NOM', '$CLI_TEL', '$CLI_MAIL', '$CLI_DIR','$CLI_RUT+$pass')";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        $sql = "select CLI_RUT, CLI_NOM, CLI_MAIL, CLI_TEL, CLI_DIR from CLIENTE";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $clientes[]=$aux;
        return array ('cuentas' => $clientes, 'pass'=>($CLI_RUT."+".$pass));

    }    
}
?>