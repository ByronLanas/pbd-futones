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

class cuentasE {
    
    public function cuentasE(){
        $this->gestionaCuentas();
    }
    public function gestionaCuentas(){
        session_write_close();
        require_once '../Model/muestraCuentas.php';

        $model= new gestionaCuentas();
        $user=$_REQUEST["USU_EMP"];
        
        if ($user!="admin")
            $modelo=$model->eliminarCuentas($user);
        else
        {
                            ?>
                <script language="JavaScript">
                    alert("No se puede eliminar este usuario");

                </script>
                
                <?php
                $modelo=$model->listarCuentas();
        }
        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["cuentas"]=$modelo;
            
            session_write_close();
            require '../View/Pages/vistaCuentas.php';
            //header("Location: ../View/Pages/vistaCuentas.php"); 


        
    }
}

?>

<?php
 
        $cli= new cuentasE();
        
?>