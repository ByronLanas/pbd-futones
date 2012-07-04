
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
            
            $link = mssql_connect('pbd.redirectme.net'/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/);                   
            if (!$link) {
                die('No se pudo verificar el usuario: ' );
            }
            mssql_select_db("PBD");
            $sql = "select * from cliente";
            $result= mssql_query($sql);
            while( $row = mssql_fetch_array($result, MSSQL_BOTH) ) {
?>
            <tr>
              <td>
                <a  <?php echo $row['CLI_RUT']; ?>  <br></a>
              </td>
            </tr>
<?php
}
?>
          </tbody>
  </body>

</html>

<?php


/*****Liberar resultados y cerrar conexion**********/
mssql_free_result($result);
mssql_close($link);
?>
