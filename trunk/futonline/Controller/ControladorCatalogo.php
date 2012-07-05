<?php

class catalogo {
    
    public function catalogo(){
        $this->recibirCatalogo();
    }
    public function recibirCatalogo(){
 
        require_once '../Model/muestraProducto.php';
        $tipoProducto=$_REQUEST["tipoProducto"];

        $model= new muestraProducto();
        $modelo=$model->tipoProducto($tipoProducto);
        
        //aqui hay q modificar una ves se implementen los permisos
            session_start(); 
            $_SESSION["productos"]=$modelo;
            
            header("Location: ../View/Pages/productosDeTipo.php?tipoProducto=$tipoProducto"); 
//require '../View/Pages/vistaMenuLogueado.php';

        
    }
}

?>

<?php
 
        $cat= new catalogo();
        
?>