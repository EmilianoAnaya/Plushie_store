<?php
session_start();
$nombre = $_SESSION['nombre'];

if($nombre == '')
{
    header("Location: index.php");
}

require "funciones/conecta.php";
$con = conecta();  //conexión

$id  = $_REQUEST['id'];

$sql    = "SELECT * FROM empleados WHERE id='$id'";
$res    = $con->query($sql);
$filas  = $res->num_rows;

$row = $res->fetch_assoc();
    $nombre    = $row["nombre"];
    $apellidos = $row["apellidos"];
    $correo    = $row["correo"];
    $rol       = $row["rol"];
    $eliminado = $row["eliminado"];
    $etiqueta  = $rol==1 ? "Ejecutivo" : "Gerente";
    $status    = $eliminado==0 ? "Activo" : "Inactivo";
    $archivo   = $row["archivo"];
    
//echo $id;
?>

<html>

    <head>
        <title>Detalles Empleados</title>
    </head>

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
            width: 800px;
            height: 100px;
            border: 1px solid black;
            grid-template-columns: 300px 300px 100px 100px;
            grid-template-rows: 25px;
            margin: -200px -415px -100px;
            top: 50%;
            left: 50%;
            position: absolute;
        }

        .caja
        {
            border: 1px solid black;
            background-color: #6e9deb;
            text-align: center;
        }

        .c1
        {
            background-color: #F6F7EC;
            padding: 20px;
        }

        .btn
        {
            background-color: #F6F7D8;
            border-radius: 5px;
            border: 1px solid black; 
            padding: 5px;
        }

        .b1
        {
            grid-column: 1/5;
            border: 1px solid black;
        }

        .foto
        {
            background-color: #F6F7EC;
        }

        .bt
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
    </style>

    <body>
        <?php
            echo "<div class='menu'>";
                echo "<a class=bt href=\"inicio.php\">INICIO</a>";
                echo "<a class=bt href=\"empleados_lista.php\">EMPLEADOS</a>";
                echo "<a class=bt href=\"productos.php\">PRODUCTOS</a>";
                echo "<a class=bt href=\"banners.php\">BANNERS</a>";
                echo "<a class=bt href=\"pedidos.php\">PEDIDOS</a>";
                echo "<a class=bt href=\"bienvenido.php\">BIENVENIDO USER</a>";
                echo "<a class=bt href=\"cerrar_sesion.php\">CERRAR SESION</a>";
            echo "</div><br>";
        ?>
        <div class='layout'>
            <div class="caja">Nombre completo</div>
            <div class="caja">Correo</div>
            <div class="caja">Rol</div>
            <div class="caja">Status</div>
            <?php
            echo '<div class="caja c1">'."$nombre $apellidos".'</div>';
            echo '<div class="caja c1">'.$correo.'</div>';
            echo '<div class="caja c1">'.$etiqueta.'</div>';
            echo '<div class="caja c1">'.$status.'</div>';
            ?>
            <div class="caja b1">Foto de Perfil</div>
            <?php
            echo '<div class="caja b1 foto">'."<img width= '200' height= '200' src=\"archivos/$archivo\">".'</div>';
            echo '<div>'."<a href=\"empleados_lista.php\" class='btn'>Regresar al listado de empleados</a>".'</div>';
            ?>
        </div>
    </body>

</html>