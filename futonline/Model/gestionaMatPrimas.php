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
class gestionaMatPrimas{
    
    var $link;
    public function gestionaMatPrimas(){
      //$dsn = "Driver={SQL Server Native Client 10.0};Server=NOTE\SQLEXPRESS;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $dsn = "Driver={SQL Server Native Client 11.0};Server=NOTE-PC\DIEGO;Database=PBD;Integrated Security=SSPI;Persist Security Info=False;";
      $this->link= odbc_connect($dsn/*HOST*/, 'byron'/*USER*/, 'byron'/*PASSWORD*/) or die('Critical Error: No se ha podido conectar a la base de datos') ;                    
      
    }
    public function listarMatPrimas(){
                    
        $sql = "select * from ALGODON";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $algodones[]=$aux;
        
        $sql = "select * from CIERRE";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $cierres[]=$aux;
        
        $sql = "select * from ESPUMA";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $espumas[]=$aux;
        
        $sql = "select * from HILO";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $hilos[]=$aux;
        
        $sql = "select * from MADERA";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $maderas[]=$aux;
        
        $sql = "select T.ID_MAT,CANT_MAT, CANT_MIN_MAT, ANC_TEL,MAT_TEL,c.COL_COL,CANT_COL from TELA t join COLOR c on (t.ID_MAT=c.ID_MAT) order by (MAT_TEL); ";
        
        $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        
        while($aux=odbc_fetch_array($result))
            $telas[]=$aux;
        
        return array( 'algodones'=> $algodones ,'hilos'=> $hilos ,'maderas'=> $maderas ,'cierres'=> $cierres ,"espumas"=> $espumas, "telas"=>$telas);

    }
    public function eliminarMatPrimas($ID_MAT,$TIP_MAT,$COL_COL){
                    
        if ($TIP_MAT=="tela"){
            
            $sql = "delete from COLOR where ID_MAT='$ID_MAT' and COL_COL='$COL_COL'";
        
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            
            $sql ="select count (*) as cant from COLOR where ID_MAT=$ID_MAT";
            
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            odbc_fetch_row($result);
            
            if(odbc_result($result, "cant")==0){
                
                $sql = "delete from $TIP_MAT where ID_MAT='$ID_MAT'";
            
                $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));

                $sql = "delete from MATERIAS_PRIMAS where ID_MAT='$ID_MAT'";

                $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            }
            
        }  else {
            
            $sql = "delete from $TIP_MAT where ID_MAT='$ID_MAT'";
            
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            
            $sql = "delete from MATERIAS_PRIMAS where ID_MAT='$ID_MAT'";
         
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        }
        
        
        
        
        return  $this->listarMatPrimas();

    }    
    public function modificarMatPrimas($ID_MAT,$TIP_MAT, $CANT_MAT, $COL_COL, $CANT_COL){
                    
        if ($TIP_MAT=="tela"){
            
            $sql = "update COLOR set CANT_COL='$CANT_COL' where ID_MAT='$ID_MAT' and COL_COL='$COL_COL'";
        
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
          
        }  else {
            
            $sql = "update $TIP_MAT set CANT_MAT='$CANT_MAT' where ID_MAT='$ID_MAT'";
            
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            
            $sql = "update MATERIAS_PRIMAS set CANT_MAT='$CANT_MAT' where ID_MAT='$ID_MAT'";
         
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
        }       
        
        return  $this->listarMatPrimas();

    }    
    public function agregarMatPrimas($TIP_MAT, $CANT_MAT, $CANT_MIN_MAT, $CAL_ALG, $LAR_CIE, $ANC_CIE, $COL_CIE, $DEN_ESP, $GRO_ESP, $HIL_COL, $HIL_ESP, $LAR_MAD, $ANC_MAD, $ALT_MAD, $ANC_TEL, $MAT_TEL, $COL_COL, $CANT_COL,$TIP_MAD){
        
        if($TIP_MAT=="algodon"){
            
            $sql = "insert into MATERIAS_PRIMAS (TIP_MAT, CANT_MAT, CANT_MIN_MAT) VALUES('$TIP_MAT', '$CANT_MAT', '$CANT_MIN_MAT')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec")); 
            
            $sql ="select top 1 ID_MAT from  MATERIAS_PRIMAS order by ID_MAT desc";
            
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            
            odbc_fetch_row($result);
            
            $id=odbc_result($result, "ID_MAT");
            
            $sql = "insert into ALGODON (ID_MAT,TIP_MAT, CANT_MAT, CANT_MIN_MAT, CAL_ALG) VALUES('$id', '$TIP_MAT', '$CANT_MAT', '$CANT_MIN_MAT', '$CAL_ALG')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));           

        }
        else if($TIP_MAT=="cierre"){
            
            $sql = "insert into MATERIAS_PRIMAS (TIP_MAT, CANT_MAT, CANT_MIN_MAT) VALUES('$TIP_MAT', '$CANT_MAT', '$CANT_MIN_MAT')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec")); 
            
            $sql ="select top 1 ID_MAT from  MATERIAS_PRIMAS order by ID_MAT desc";
            
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            
            odbc_fetch_row($result);
            
            $id=odbc_result($result, "ID_MAT");
            
            $sql = "insert into CIERRE (ID_MAT,TIP_MAT, CANT_MAT, CANT_MIN_MAT, LAR_CIE, ANC_CIE, COL_CIE) VALUES('$id', '$TIP_MAT', '$CANT_MAT', '$CANT_MIN_MAT', '$LAR_CIE','$ANC_CIE','$COL_CIE')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));           

        }
        else if($TIP_MAT=="espuma"){
            
            $sql = "insert into MATERIAS_PRIMAS (TIP_MAT, CANT_MAT, CANT_MIN_MAT) VALUES('$TIP_MAT', '$CANT_MAT', '$CANT_MIN_MAT')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec")); 
            
            $sql ="select top 1 ID_MAT from  MATERIAS_PRIMAS order by ID_MAT desc";
            
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            
            odbc_fetch_row($result);
            
            $id=odbc_result($result, "ID_MAT");
            
            $sql = "insert into ESPUMA (ID_MAT,TIP_MAT, CANT_MAT, CANT_MIN_MAT, DEN_ESP, GRO_ESP) VALUES('$id', '$TIP_MAT', '$CANT_MAT', '$CANT_MIN_MAT', '$DEN_ESP','$GRO_ESP')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));           

        }
        else if($TIP_MAT=="hilo"){
            
            $sql = "insert into MATERIAS_PRIMAS (TIP_MAT, CANT_MAT, CANT_MIN_MAT) VALUES('$TIP_MAT', '$CANT_MAT', '$CANT_MIN_MAT')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec")); 
            
            $sql ="select top 1 ID_MAT from  MATERIAS_PRIMAS order by ID_MAT desc";
            
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            
            odbc_fetch_row($result);
            
            $id=odbc_result($result, "ID_MAT");
            
            $sql = "insert into HILO (ID_MAT,TIP_MAT, CANT_MAT, CANT_MIN_MAT, HIL_COL, HIL_ESP) VALUES('$id', '$TIP_MAT', '$CANT_MAT', '$CANT_MIN_MAT', '$HIL_COL','$HIL_ESP')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));           

        }
        else if($TIP_MAT=="madera"){
            
            $sql = "insert into MATERIAS_PRIMAS (TIP_MAT, CANT_MAT, CANT_MIN_MAT) VALUES('$TIP_MAT', '$CANT_MAT', '$CANT_MIN_MAT')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec")); 
            
            $sql ="select top 1 ID_MAT from  MATERIAS_PRIMAS order by ID_MAT desc";
            
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            
            odbc_fetch_row($result);
            
            $id=odbc_result($result, "ID_MAT");
            
            $sql = "insert into MADERA (ID_MAT,TIP_MAT, CANT_MAT, CANT_MIN_MAT, LAR_MAD, ANC_MAD, ALT_MAD,TIP_MAD) VALUES('$id', '$TIP_MAT', '$CANT_MAT', '$CANT_MIN_MAT', '$LAR_MAD','$ANC_MAD','$ALT_MAD','$TIP_MAD')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));           

        }
        else if($TIP_MAT=="tela"){
            
            $sql = "insert into MATERIAS_PRIMAS (TIP_MAT, CANT_MAT, CANT_MIN_MAT) VALUES('$TIP_MAT', '$CANT_COL', '$CANT_MIN_MAT')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec")); 
            
            $sql ="select top 1 ID_MAT from  MATERIAS_PRIMAS order by ID_MAT desc";
            
            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));
            
            odbc_fetch_row($result);
            
            $id=odbc_result($result, "ID_MAT");
            
            $sql = "insert into TELA (ID_MAT,TIP_MAT, CANT_MAT, CANT_MIN_MAT, ANC_TEL, MAT_TEL) VALUES('$id', '$TIP_MAT', '$CANT_COL', '$CANT_MIN_MAT','$ANC_TEL','$MAT_TEL')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));         
            
            $sql = "insert into COLOR (ID_MAT,CANT_COL,COL_COL) VALUES('$id', '$CANT_COL', '$COL_COL')";

            $result= odbc_exec($this->link,$sql)or die(exit("Error en odbc_exec"));

        }
        
        return  $this->listarMatPrimas();
    }
    
}
?>