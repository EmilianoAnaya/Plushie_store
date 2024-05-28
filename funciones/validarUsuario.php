<?php
//CONECTA
session_start();
require "conecta.php";
$con = conecta();


$correo     = $_REQUEST['correo'];
$pass       = $_REQUEST['password'];
$Encpass    = md5($pass); 

$sql = "SELECT * FROM empleados
        WHERE status = 1 AND eliminado = 0 AND correo ='$correo' AND pass ='$Encpass'"; //<--La password debe estar encripitada
$res = $con->query($sql); 
$filas = $res->num_rows;

if($filas == 1){
    $row    = $res->fetch_assoc();
    $idU    = $row["id"];
    $nombre = $row["nombre"]. ' '.$row["apellidos"];
    $correo = $row["correo"];
    $_SESSION['idU']        = $idU;
    $_SESSION['nombre']     = $nombre;
    $_SESSION['correo']     = $correo;
}


echo $filas;


?>