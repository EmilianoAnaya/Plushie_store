<?php
session_start();
$nombre = $_SESSION['nombre'];
if($nombre == '')
{
    header("Location: index.php");
}
?>
<html>
    <head>
        <title>Bienvenido (back end)</title>
        <style>
            body
        {
            background-image: url("http://drive.google.com/uc?export=view&id=1br8nIVyCruGjbFfzboepeiZ7W94j3cYl");
            background-repeat:no-repeat;
            background-position-x:center;
            background-position-y:center;
            background-size: cover;
        }

        .layout
        {
            display: grid;
            width: 500px;
            height: auto;
            background-color: whitesmoke;
            grid-template-rows: 35% 30%;
            border-radius: 25px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -100px -240px -100px;
            padding: 0 10px 0 10px;
        }

        .box
        {
            display: grid;
            width: auto;
            height: auto;
            margin: auto auto;
            padding: 1px;
            border-radius: 25px;
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
            -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -khtml-user-select: none; /* Konqueror HTML */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
        }
        </style>
    </head>
    <body>
        <?php
        echo "<div class='menu'>";
            echo "<a class=btn href=\"inicio.php\">INICIO</a>";
            echo "<a class=btn href=\"empleados_lista.php\">EMPLEADOS</a>";
            echo "<a class=btn href=\"productos.php\">PRODUCTOS</a>";
            echo "<a class=btn href=\"banners.php\">BANNERS</a>";
            echo "<a class=btn href=\"pedidos.php\">PEDIDOS</a>";
            echo "<a class='btn b1' >BIENVENIDO USER</a>";
            echo "<a class=btn href=\"cerrar_sesion.php\">CERRAR SESION</a>";
        echo "</div>";

        echo "<div class='layout'>";
            echo "<div class='box'><h1 align='center'>Bienvenido: </div></h1>";
            echo "<div class='box'><h1 align='center'>".$nombre."</div></h1>";
            //echo "<div class='box'><a class=btn href='salir_sesion.php'>Cerrar sesion</a></div>";
        echo "</div>"
        ?>
    </body>
</html>