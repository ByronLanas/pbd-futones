

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
        if($modelo==1){
            session_start(); 
            $_SESSION["usuario"]=$usuario;
            $_SESSION["nivelPermiso"]=1;
            header("Location: ../View/Pages/vistaMenuLogueado.php"); 
//require '../View/Pages/vistaMenuLogueado.php';

        }else if($modelo==2){
            session_start(); 
            $_SESSION["usuario"]=$usuario;
            $_SESSION["nivelPermiso"]=2;
            header("Location: ../View/Pages/vistaMenuLogueadoE.php"); 
//require '../View/Pages/vistaMenuLogueado.php';

        }else if($modelo==3){
            session_start(); 
            $_SESSION["usuario"]=$usuario;
            $_SESSION["nivelPermiso"]=3;
            header("Location: ../View/Pages/vistaMenuLogueadoA.php"); 
//require '../View/Pages/vistaMenuLogueado.php';

        }
    }
}

?>

<?php
 
        $log= new login();
        
?>        
