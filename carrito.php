<?php
require "funciones/conecta.php";
$con = conecta();
ini_set('display_errors', 0);
session_start();
$nombre = $_SESSION['nombre'];
$id     = $_SESSION['idU'];

if($nombre == '')
{
    header("Location: login.php");
}

$sql_pedidos = "SELECT id FROM pedidos WHERE id_cliente = $id";
$res_pedidos = $con->query($sql_pedidos);
$num = mysqli_num_rows($res_pedidos);
$idP = $num;

$sql_productos = "SELECT * FROM pedidos_productos WHERE status = 0 AND id_pedido = $idP";
$res_productos = $con->query($sql_productos);

?>

<html>

    <head>
        <title>Carrito</title>
        <link href="Css/Encabezado.css" rel="stylesheet" type="text/css">
        <link href="Css/Carrito.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <header>
            <div class="logo">
                <img src="Imagenes/Logo.png" alt="logo">
            </div>
            <nav>
                <a href=<?php echo "\"home.php\""?>>Home</a>
                <a href=<?php echo "\"productos.php\""?>>Productos</a>
                <a href=<?php echo "\"contacto.php\""?>>Contacto</a>
                <a href=<?php echo "\"carrito01.php\""?> class="selected">Carrito</a>
                <a href=<?php echo "\"cerrar_sesion.php\""?>>Cerrar Sesion</a>
            </nav>
        </header>

        <content>
            <div class="carrito">
                <div class="carrito-head">
                    <div class="text-head">Imagen</div>
                    <div class="text-head">Producto</div>
                    <div class="text-head">Cantidad</div>
                    <div class="text-head">Precio Unitario</div>
                    <div class="text-head">Subtotal</div>
                    <div class="text-head"></div>
                </div>
                <?php
                while($row = $res_productos->fetch_assoc())
                {
                    $cantidad       = $row['cantidad'];
                    $idP            = $row['id_producto'];
                    $costo_unitario = $row['costo'];

                    $sql_infoproducto = "SELECT * FROM productos WHERE status = 1 AND id='$idP' AND eliminado = 0 ";
                    $res_infoproducto = $con->query($sql_infoproducto);
                    $fila = $res_infoproducto->fetch_assoc();
                    $archivo    = $fila['archivo'];
                    $nombre     = $fila['nombre'];
                    $subtotal   = $costo_unitario * $cantidad;
                    $total      += $subtotal;
                    $cantidad_total += $cantidad;

                    echo '<div class="carrito-content" id="reg'.$idP.'">';
                        echo '<div class="imagen">';
                            echo "<img src=\"Admin\archivos/$archivo\" height='80px'>";
                        echo '</div>';
                        echo '<div class="text-content">'.$nombre.'</div>';
                        echo '<div class="text-content">'.$cantidad.'</div>';
                        echo '<div class="text-content">$'.$costo_unitario.'</div>';
                        echo '<div class="text-content">$'.$subtotal.'</div>';
                        //echo '<div class="text-content"><a id="idr" class="boton" '."onclick='eliminaproducto($idP)';".'>Eliminar</a></div>';
                    echo '</div>';
                }
                ?>     
            </div>
            
            <div class="cierre">
                    <div class="total">Total:<?php echo $total?></div>
                    <div class="total">Cantidad de Productos:<?php echo $cantidad_total?></div>
            </div>
        </content>
        
        <footer>
            <p>Derechos reservados por la 'Meww Company'</p>
        </footer>

    </body>
</html>