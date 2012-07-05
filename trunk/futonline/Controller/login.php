<?php


include '/futonline/Model/verificaLogin.php';
$usuario=$_REQUEST["usuario"];
$password=$_REQUEST["password"];
if($RES==$usuario){
    alert("exito");
}
?>

