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
        <title>BANNERS</title>
        <style>
        .layout
    {
        display: grid;
        width: 600px;
        height: auto;
        grid-template-rows: 25px;
    }

    .caja
    {
        display: grid;
        border: 1px solid black;
        grid-template-columns: 100px 200px 100px 100px 100px;
    }

    .c1
    {
        border: 1px solid black;
        background-color: #81ebff;
        text-align: center;
    }

    .c2
    {
        border: 1px solid black;
        background-color: #F6F7EC;
        text-align: center;
        font-size: 20px;
    }

    .bt
    {
        background-color: #F6F7D8;
        border-radius: 5px;
        border: 1px solid black;   
        text-decoration: none; 
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-size: 18px;
        -webkit-touch-callout: none; 
            -webkit-user-select: none; 
            -khtml-user-select: none; 
            -moz-user-select: none; 
            -ms-user-select: none; 
            user-select: none;
    }

    .s1
    {
        padding: 5px;
    }

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
        </style>
    </head>

<script src="../js/jquery-3.3.1.min.js"></script>
<script>
    //Dirección del php para borrar href=\"empleados_elimina.php?id=$id\"
    function ejecutaAjax(id)
    {
        //alert("Hello World "+id);
        if(confirm("¿Estas seguro de borrar el producto #"+id+"?")==true){
            $.ajax
            ({
                url :'banners_elimina.php?id='+id,
                type:'post'
            });
            $('#reg'+id).hide();
        }
    }

</script>

<?php
require "funciones/conecta.php";  //Hace un include
$con = conecta();  //conexión

$sql     = "SELECT * 
            FROM banners  
            WHERE status = 1 AND eliminado = 0";  //Consulta  (Asterisco * todas las columnas) , where condiciona, FROM tabla
$res     = $con->query($sql);   //Le asigna la base de datos en forma de tabla
$filas   = $res->num_rows;


    echo "<div class='menu'>";
        echo "<a class=btn href=\"inicio.php\">INICIO</a>";
        echo "<a class=btn href=\"empleados_lista.php\">EMPLEADOS</a>";
        echo "<a class=btn href=\"productos.php\">PRODUCTOS</a>";
        echo "<a class='btn b1'>BANNERS</a>";
        echo "<a class=btn href=\"pedidos.php\">PEDIDOS</a>";
        echo "<a class='btn' href=\"bienvenido.php\">BIENVENIDO USER</a>";
        echo "<a class=btn href=\"cerrar_sesion.php\">CERRAR SESION</a>";
    echo "</div>";

echo "<br><a href=\"banners_nuevo.php\" class='bt s1'>Dar de Alta</a><br><br>"; 
?>

<div class="layout">
    <div class="caja">
        <div class="c1">ID</div>
        <div class="c1">Nombre</div>
        <div class="c1">Ver Detalle</div>
        <div class="c1">Editar</div>
        <div class="c1">Eliminar</div>
    </div>
    <?php
while($row = $res->fetch_array())  {  //fetch_array toma fila por fila
    $id         = $row["id"];
    $nombre     = $row["nombre"];
    ?>
    <div class = "caja" id="reg<?php echo $row["id"]?>">
        <div class="c2"><?php echo "$id"?></div>
        <div class="c2"><?php echo "$nombre"?></div>
        <div class="c2"><a <?php echo "href=\"banners_perfil.php?id=$id?\""?> class='bt'>Ver Detalle</a></div>
        <div class="c2"><a <?php echo "href=\"banners_editar.php?id=$id\""?> class='bt'>Editar</a></div>
        <div class="c2"><a id = 'idr' class = 'bt' <?php echo "onclick='ejecutaAjax($id)';"?>>Eliminar</a></div>
    </div>


<?php } ?>

</html>