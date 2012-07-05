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
               
               
               }}
?>
