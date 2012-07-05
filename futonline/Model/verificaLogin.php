<?php
class verificaLogin{
    
    var $link;
    public function verificaLogin(){
      $dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/);                   
      if (!$this->link) {
          exit( "Error al conectar: " . $link);
          
          }  
    }
    public function verificaLog($usuario,$password){
                    
        $sql = "select * from CLIENTE;";
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        while(odbc_fetch_row($result) ) {
            $user= odbc_result($result, "CLI_RUT");
            if ($user==$usuario){
                $pass= odbc_result($result, "CLI_PASS");
                if($password==$pass)
                    return 1;//cliente logueado
                else {
                    return 0; //contraseña incorrecta
                }
            }
            
            }
        $sql = "select * from EMPLEADO;";
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        while(odbc_fetch_row($result) ) {
            $user= odbc_result($result, "RUT_EMP");
            if ($user==$usuario){
                $pass= odbc_result($result, "PASS_EMP");
                $tipo= odbc_result($result, "PASS_EMP");
                if($password==$pass){
                    if($tipo=="administrador"){
                    
                        return 3;//administrador logueado
                }
                    else {
                    return 2; //empleado logueado
                }
            }  else {
                    return 0;
            }
            
            }       
               
               }
               return -1;//usuario no existe
    }
}
?>
