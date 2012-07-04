
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html40/strict.dtd">
<html>
    <head>
        <script type="text/javascript">
    function confirLink(msg) {
      return confirm(msg);
    }</script>
        <meta name="keywords" contents="ejemplos,HTML">
        <title>INICIO</title>
    </head>
    <body>
        <h1>Listado de Cursos</h1>
        <?php
            $dsn = "Driver={SQL Server Native Client 10.0};Server=tcp:158.170.255.202,1433;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
            $link = odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/);                   
            if (!$link) {
                exit( "Error al conectar: " . $link);
            }else{
            
            $sql = "select * from CLIENTE;";
            $result= odbc_exec($link,$sql)or die(exit("Error en odbc_exec"));
            while(odbc_fetch_row($result) ) {
               $RES= odbc_result($result, "CLI_RUT");
?>          
            <tr>
              <td>
<label for="nombre" id="la_nombre"><?php echo $RES;  ?><br> </label>              </td>
            </tr>
<?php
}}
?>
          </tbody>
  </body>

</html>

<?php


/*****Liberar resultados y cerrar conexion**********/
odbc_close( $link );
?>

