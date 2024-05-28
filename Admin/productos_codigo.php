<?php
//salva.php
require "funciones/conecta.php";  //Hace un include
$con = conecta();  //conexión

//Recibe variables
$id     = $_POST['id'];
$codigo = $_POST['codigo'];
$ban    = 0;

if($id>0){
    $select = "SELECT * FROM productos WHERE codigo='$codigo' AND id!='$id'";
    $ejecutar_select = mysqli_query($con, $select);
    $check_correo = mysqli_num_rows($ejecutar_select);
    if($check_correo == 1){
        $ban = 1;
    }
}else{
$select = "SELECT * FROM productos WHERE codigo='$codigo'";
$ejecutar_select = mysqli_query($con, $select);
$check_correo = mysqli_num_rows($ejecutar_select);

if($check_correo == 1){
    $ban = 1;
}}

echo $ban;


//$res = $con->query($sql);  //Ejecuta la consulta que se hace en la linea 16

?>