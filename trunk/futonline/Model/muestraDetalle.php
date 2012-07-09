<?php
session_start();


if (!isset($_SESSION["usuario"])) {
    ?><body>
        <script type="text/javascript">
            window.location="/futonline/View/Pages/vistaInicio.php";
        </script>
    </body><?php
}
$usuario = $_SESSION["usuario"];
?><?php

class muestraDetalle {

    var $link;

    public function muestraDetalle() {
        //$dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
        $dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
        $this->link = odbc_connect($dsn/* HOST */, 'byron'/* USER */, 'byron'/* PASSWORD */) or die('Critical Error: No se ha podido conectar a la base de datos');
    }

    public function consultar_detalle($usuario,$id) {
        
        $sql = "SELECT cli_nom FROM cliente WHERE cli_rut='$usuario'";

        $result = odbc_exec($this->link, $sql) or die(exit("Error en odbc_exec"));
        $nombre = odbc_result($result, "CLI_NOM");
        $_SESSION["nombre"] = $nombre;
        $sql = "SELECT PR.*,CLI_NOM,P.COD_PED,P.FEC_PED,P.EST_PED,P.TIEM_PED,D.COL_COL,D.COD_PED,D.CANT_DET FROM PEDIDO AS P,DETALLE AS D,CLIENTE AS C, PRODUCTO AS PR 
WHERE P.CLI_RUT = C.CLI_RUT AND C.CLI_RUT = '$usuario' AND P.COD_PED = D.COD_PED and D.COD_PED='$id' AND D.COD_PROD = PR.COD_PROD
";
        $result = odbc_exec($this->link, $sql) or die(exit("Error en odbc_exec"));
        while ($aux = odbc_fetch_array($result))
            $detalles[] = $aux;
        return $detalles;
    }

}
?>
