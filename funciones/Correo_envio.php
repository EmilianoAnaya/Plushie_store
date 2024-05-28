<?php

$nombre     = $_POST['nombre'];
$correo     = $_POST['correo'];
$comentario = $_POST['comentario'];

if(!empty($correo) && !empty($nombre) && !empty($comentario)){

    $destino    ='zgrupo935@gmail.com';
    $asunto     ='Soporte - Contactos';

    $cuerpo ='
    <html>
        <head>
            <title>Prueba Correo</title>
        </head>
        <body>
            <h1>Email de '.$nombre.' ('.$correo.')</h1>
            <p>'.$comentario.'</p>
        </body>
    </html>';

    $headers ="MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: $nombre <$correo>\r\n";
    $headers .= "Return-path: $destino\r\n";

    mail($destino,$asunto,$cuerpo,$headers);

    echo "Email enviado correctamente";

}else{
    echo "Error al enviar el mensaje";
}

?>