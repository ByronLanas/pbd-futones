

<?php

class login {
    
    public function login(){
        $this->logear();
    }
    public function logear(){
 
        require_once '../Model/verificaLogin.php';
        $usuario=$_REQUEST["usuario"];
        $password=$_REQUEST["password"];

        $model= new verificaLogin();
        $modelo=$model->verificaLog($usuario,$password);
        
        //aqui hay q modificar una ves se implementen los permisos
        if($modelo>0){
            session_start(); 
            $_SESSION["usuario"]=$usuario;
            
            header("Location: ../View/Pages/vistaMenuLogueado.php"); 
//require '../View/Pages/vistaMenuLogueado.php';

        }
    }
}

?>

<?php
 
        $log= new login();
        
?>        
