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

class CuentasA {
    
    public function CuentasA(){
        $this->gestionaCuentasA();
    }
    public function gestionaCuentasA(){
        session_write_close();
        require_once '../Model/muestraCuentas.php';

        $model= new gestionaCuentas();
        $modelo=$model->agregarCuentas($_REQUEST["USU_EMP"],$_REQUEST["TIP_EMP"]);
        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["cuentas"]=$modelo["cuentas"];
            ?> 
            <script language="JavaScript">
                    alert("La contraseña  del nuevo usuario es: <?php echo $modelo["pass"]?>");
            </script>
            <?php
                        session_write_close();
            require '../View/Pages/vistaCuentas.php';
           // header("Location: ../View/Pages/vistaCuentas.php"); 


        
    }
}

?>

<?php
 
        $cli= new CuentasA();
        
?>