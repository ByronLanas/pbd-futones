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

class datosUsuario {
    
    public function datosUsuario(){
        $this->obtenerDatos();
    }
    public function obtenerDatos(){
        session_write_close();
        require_once '../Model/manejoDeDatos.php';


        $accion=$_REQUEST["accion"];
        
        
        
        
        $usuario=$_SESSION["usuario"];
        $model= new manejoDeDatos();
        if($accion=="obtener"){
            $modelo=$model->obtiene($usuario);
            $_SESSION["datos"]=$modelo;
        }
            
        elseif ($accion=="modificar") {
            
            if($_SESSION["nivelPermiso"]==1){
                $cli_nom=$_REQUEST["nombre"];
                $cli_dir=$_REQUEST["direccion"];
                $cli_tel=$_REQUEST["telefono"];
                $cli_pass=$_REQUEST["pass"];
                $cli_rep_pass=$_REQUEST["rep_pass"];
                $cli_mail=$_REQUEST["mail"];
            
            
            
            if($cli_pass==""||$cli_dir==""||$cli_mail==""||$cli_nom==""||$cli_rep_pass==""||$cli_tel==""){
                ?>
                <script language="JavaScript">
                    alert("No debe dejar valores vacios");
                </script>
                <?php
            }elseif ($cli_pass!=$cli_rep_pass) {
                ?>
                <script language="JavaScript">
                    alert("Las contraseñas no coinciden");
                </script>
                <?php
            }  else {
                $modelo=$model->modificaC($usuario,$cli_nom,$cli_tel,$cli_mail,$cli_pass,$cli_dir);
                $modelo=$model->obtiene($usuario);
                $_SESSION["datos"]=$modelo;
                ?>
                <script language="JavaScript">
                    alert("modificacion realizada con exito");
                </script>
                <?php
            }
            }
            
            if($_SESSION["nivelPermiso"]==2){
                $emp_pass=$_REQUEST["pass"];
                $emp_rep_pass=$_REQUEST["rep_pass"];
            
            
            if($emp_pass==""||$emp_rep_pass==""){
                ?>
                <script language="JavaScript">
                    alert("No debe dejar valores vacios");
                </script>
                <?php
            }elseif ($emp_pass!=$emp_rep_pass) {
                ?>
                <script language="JavaScript">
                    alert("Las contraseñas no coinciden");
                </script>
                <?php
            }  else {
                $modelo=$model->modificaE($usuario,$emp_pass);
                $modelo=$model->obtiene($usuario);
                $_SESSION["datos"]=$modelo;
                ?>
                <script language="JavaScript">
                    alert("modificacion realizada con exito");
                </script>
                <?php
            }
            }
            if($_SESSION["nivelPermiso"]==3){
                $emp_pass=$_REQUEST["pass"];
                $emp_rep_pass=$_REQUEST["rep_pass"];
                $emp_tip=$_REQUEST["tipo"];
            
            
            if($emp_pass==""||$emp_rep_pass==""||$emp_tip==""){
                ?>
                <script language="JavaScript">
                    alert("No debe dejar valores vacios");
                </script>
                <?php
            }elseif ($emp_pass!=$emp_rep_pass) {
                ?>
                <script language="JavaScript">
                    alert("Las contraseñas no coinciden");
                </script>
                <?php
            }  else {
                $modelo=$model->modificaA($usuario,$emp_pass,$emp_tip);
                $modelo=$model->obtiene($usuario);
                $_SESSION["datos"]=$modelo;
                if($emp_tip=="empleado")
                    $_SESSION["nivelPermiso"]=2;
                ?>
                <script language="JavaScript">
                    alert("modificacion realizada con exito");
                </script>
                <?php
            }
            }
        }
        session_write_close();
        require '../View/Pages/vistaDatosUsuario.php';

        
    }
}

?>

<?php
 
        $datos= new datosUsuario();
        
?>        
