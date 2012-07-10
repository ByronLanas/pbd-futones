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

class ProductoA {
    
    public function ProductoA(){
        $this->gestionaProducto();
    }
    public function gestionaProducto(){
        session_write_close();
        require_once '../Model/muestraProducto.php';

        $model= new muestraProducto();
        $NOM_PROD=$_REQUEST["NOM_PROD"];
        $DESC_PROD=$_REQUEST["DESC_PROD"];
        $PREC_PROD=$_REQUEST["PREC_PROD"];
        $TIP_PROD=$_REQUEST["TIP_PROD"];
        

            $modelo=$model->agregarProducto($NOM_PROD,$DESC_PROD,$PREC_PROD,$TIP_PROD);


                $modelo=$model->tipoProducto($TIP_PROD);

        
        //aqui hay q modificar una ves se implementen los permisos

            $_SESSION["producto"]=$modelo;
            
          
            header("Location: /futonline/Controller/ControladorCatalogo.php?tipoProducto=".$TIP_PROD); 


        
    }
}

?>

<?php
 
        $cli= new ProductoA();
        
?>