<?php
//ubicación del archivo:
//funciones/conecta.php
define("HOST",'localhost');
define("PORT",3307);
define("BD",'empresa');  //Constantes(Nombre_cons, valor)
define("USER_BD",'root');
define("PASS_BD",'123456');

function conecta(){
    $con = new mysqli(HOST, USER_BD, PASS_BD, BD, PORT);
    return $con;
}
?>