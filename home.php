<?php
session_start();
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';

if($nombre == '')
{
    $url = "<a href=\"login.php\">Iniciar Sesion</a>";
    $carrito = 'hidden';
}else{
    $url = "<a href=\"cerrar_sesion.php\">Cerrar Sesion</a>";
    $carrito = '';
}

require "funciones/conecta.php";
$con = conecta();
$sql_banners = "SELECT archivo FROM banners WHERE status = 1 AND eliminado = 0 order by rand() LIMIT 1";
$res_banners = $con->query($sql_banners);


$sql_productos = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0 order by rand() LIMIT 6";
$res_productos = $con->query($sql_productos);
?>
<html>

    <head>
        <title>Home</title>
        <link href="Css/Encabezado.css" rel="stylesheet" type="text/css">
        <link href="Css/Productos.css" rel="stylesheet" type="text/css">

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function agregarProducto(idP)
            {
            var cantidad = $('#cantidad').val();
            $.ajax
            ({
                url     :'agregarProducto.php',
                type    :'post',
                dataType:'text',
                data    :'idP='+idP+'&cantidad='+cantidad,
                success : function(res){
                    if(res==1){
                    swal({
                        title: 'Agregado al carrito',
                        text:   'Tu producto ha sido agregado al carrito',
                        icon:   'success'
                    });}else{
                        swal({
                        title:  'Error',
                        text:   'Tu producto no pudo agregarse al carrito',
                        icon:   'error'
                    });}
                }
            });
            }
        </script>
    </head>

    <body>
        <header>
            <div class="logo">
                <img src="Imagenes/Logo.png" alt="logo">
            </div>
            <nav>
                <a href=<?php echo "\"home.php\""?> class="selected">Home</a>
                <a href=<?php echo "\"productos.php\""?>>Productos</a>
                <a href=<?php echo "\"contacto.php\""?>>Contacto</a>
                <a href=<?php echo "\"carrito01.php\""?>>Carrito</a>
                <?php
                echo $url;
                ?>
            </nav>
        </header>

        <content>
        <div class="banner">
            <?php
                while($fila = $res_banners->fetch_assoc())
                {
                    $img = $fila["archivo"];
                    echo "<img src=\"Admin\archivos/$img\">";
                }
                
            ?>
        </div>
        
        <div class="contenedor">
            <?php
                while($row = $res_productos->fetch_assoc())
                {
                    $nombre       = $row['nombre'];
                    $costo        = $row['costo'];
                    $archivo      = $row["archivo"];
                    $idP          = $row["id"];
                    echo '<div class="producto c1">';
                        echo '<div class="imagen">';
                            echo "<img src=\"Admin\archivos/$archivo\">";
                        echo '</div>';
                        echo '<div class="descripcion">';
                            echo '<div class="text nombre">'."$nombre".'</div>';
                            echo '<div class="text price">'."$$costo".'</div><br>';
                            echo '<div class="text"><a class="btn" '."href=\"detalle_producto.php?id=$idP\"".'>Ver Producto</a></div><br>';
                            echo '<div class="text" '.$carrito.'><a class="btn" '."onclick='agregarProducto($idP)';".'>Agregar al Carrito</a></div>';
                            echo '<input type="text" value="1" id="cantidad" hidden>';
                            echo '<div class="text" hidden><input value='."$idP".'></div>';
                        echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
        </content>
            
        <footer>
            <p>Derechos reservados por la 'Meww Company'</p>
        </footer>
        
    </body>
</html>