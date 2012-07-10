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

class ProveedoresA {
    
    public function ProveedoresA(){
        $this->gestionaProveedores();
    }
    public function gestionaProveedores(){
        session_write_close();
        require_once '../Model/gestionaProveedores.php';

        $model= new gestionaProveedores();
        $RUT_PROV=$_REQUEST["RUT_PROV"];
        $NOM_PROV=$_REQUEST["NOM_PROV"];
        $DIR_PROV=$_REQUEST["DIR_PROV"];
        $TEL_PROV=$_REQUEST["TEL_PROV"];
        $mail=$_REQUEST["MAIL_PROV"];
        

            $modelo=$model->agregarProveedores($RUT_PROV,$NOM_PROV,$DIR_PROV,$TEL_PROV,$mail);


                $modelo=$model->listarProveedores();

        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["proveedores"]=$modelo;
            
            session_write_close();
            require '../View/Pages/vistaProveedores.php';
            //header("Location: ../View/Pages/vistaCuentas.php"); 


        
    }
}

?>

<?php
 
        $cli= new ProveedoresA();
        
?>