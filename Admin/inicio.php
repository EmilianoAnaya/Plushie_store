<?php
session_start();
$nombre = $_SESSION['nombre'];
if($nombre == '')
{
    header("Location: index.php");
}
?>


    <head>
        <title>INICIO</title>
        <style>
        body
        {
            background-image: url("http://drive.google.com/uc?export=view&id=1br8nIVyCruGjbFfzboepeiZ7W94j3cYl");
            background-repeat:no-repeat;
            background-position-x:center;
            background-position-y:center;
            background-size: cover;
        }


        .btn
        {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 18px;
            background: #1E90FF;
            border-radius: 25px;
            padding: 20px;
            color: #fff;
            text-decoration: none;
            text-align: center;
        }

        .menu
        {
            display: grid;
            grid-template-columns: 14.28571% 14.28571% 14.28571% 14.28571% 14.28571% 14.28571% 14.28571%;
            margin-top: 60px;
        }

        .b1
        {
            background-color: #1EC4F0;
            -webkit-touch-callout: none; 
            -webkit-user-select: none; 
            -khtml-user-select: none; 
            -moz-user-select: none; 
            -ms-user-select: none; 
            user-select: none; 
        }

        .layout
        {
            margin: 10% auto;
            display: block;
            background-color: #f8f8f8;
            width: 50%;
            height: 30%;
            box-shadow: 8px 8px #979797;
        }

        .contenedor
        {
            display: grid;
            grid-template-columns: 25% auto;
        }

        .Imagen
        {
            margin: 10% auto;
            width: 100%;
        }

        .info
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .texto
        {
            font-size: x-large;
            font-family: 'Verdana';
            font-style: oblique;
            font-weight: bold;  
        }
        </style>
    </head>

<html>
<?php
    //echo $nombre;
    echo "<div class='menu'>";
        echo "<a class='btn b1'>INICIO</a>";
        echo "<a class=btn href=\"empleados_lista.php\">EMPLEADOS</a>";
        echo "<a class=btn href=\"productos.php\">PRODUCTOS</a>";
        echo "<a class=btn href=\"banners.php\">BANNERS</a>";
        echo "<a class=btn href=\"pedidos.php\">PEDIDOS</a>";
        echo "<a class='btn' href=\"bienvenido.php\">BIENVENIDO USER</a>";
        echo "<a class=btn href=\"cerrar_sesion.php\">CERRAR SESION</a>";
    echo "</div>";

?>

<div class="layout">
        <div class="contenedor">
            <div class="Imagen">
                <img src="http://drive.google.com/uc?export=view&id=1dF39Pl39M-EtoiI6oAAFuddHWebdV9jX" width="100%">
            </div>
            <div class="info">
                <div class="texto">En esta tienda, nosotros nos comprometemos en la entrega de cada uno de nuestros 
                                    productos en tiempo y forma con el propósito de hacer que cada usuario sea
                                    feliz con el producto que este ha adquirido</div>
            </div>
        </div>
</div>




</html>