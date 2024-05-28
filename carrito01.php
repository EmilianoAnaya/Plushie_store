<?php
ini_set('display_errors', 0);
session_start();
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$id     = $_SESSION['idU'];

if($nombre == '')
{
    header("Location: login.php");
}

require "funciones/conecta.php";
$con = conecta();
$sql_productos = "SELECT * FROM pedidos_productos WHERE status = 1";
$res_productos = $con->query($sql_productos);

?>


<html>

    <head>
        <title>Carrito</title>
        <link href="Css/Encabezado.css" rel="stylesheet" type="text/css">
        <link href="Css/Carrito.css" rel="stylesheet" type="text/css">

        <script src="js/jquery-3.3.1.min.js"></script>
        <script>
            function eliminaproducto(id)
            {
                $.ajax
                ({
                    url: 'elimina_producto.php?id='+id,
                    type: 'post'
                });
                $('#reg'+id).hide();
                window.location.href='carrito01.php';
            };

            function updatestock(id)
            {
                var id          = $('#id'+id).val();
                var cantidad    = $('#cantidad'+id).val();
                $.post("actualiza_cantidad.php",{id:id, cantidad:cantidad},
                    function(res){
                        window.location.href='carrito01.php';
                    })
            };

            function comprar()
            {
                var total           = $('#total').val();
                var cantidad_tot    = $('#cantidad_tot').val();
                var id              = $('#idU').val();

                document.forma01.method = 'post';
                document.forma01.action = 'finalizar_compra.php';
                document.forma01.submit();
            };
            
        </script>
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
                    <div class="text-head">Eliminar</div>
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
                            echo "<img src=\Admin\archivos/$archivo\" height='80px'>";
                        echo '</div>';
                        echo '<div class="text-content">'.$nombre.'</div>';
                        echo '<form class="stock-update" name="forma02" action="actualiza_cantidad.php" method="post">';
                            echo '<input id="id'.$idP.'" name="id'.$idP.'" value="'.$idP.'"hidden>';
                            echo '<div class="text-content"><input min="1" class="cantidad" name="cantidad'.$idP.'" id="cantidad'.$idP.'" type="number" value="'.$cantidad.'"></div>';
                            echo '<div class="text-content"><a type=submit class="mini-botn" href="javascript:void(0);" '."onclick='updatestock($idP)';".'"><img src="Imagenes/recarga.png" alt="logo" height="100%" width="100%"></a></div>';
                        echo '</form>';
                        echo '<div class="text-content">$'.$costo_unitario.'</div>';
                        echo '<div class="text-content">$'.$subtotal.'</div>';
                        echo '<div class="text-content"><a id="idr" class="boton" '."onclick='eliminaproducto($idP)';".'>Eliminar</a></div>';
                    echo '</div>';
                }
                ?>  
                  
            </div>
            
            <div class="cierre">
                <form class="stock-update" name="forma01" action="finalizar_compra.php" method="post">
                    <div class="total" hidden>ID:<input id="idU" name="idU" class="finish" value="<?php echo $id?>" readonly></div>
                    <div class="total">Total:<input id="total" name="total" class="finish" value="<?php echo $total?>" readonly></div>
                    <div class="total">Cantidad de Productos:<input id="cantidad_tot" name="cantidad_tot" class="finish" value="<?php echo $cantidad_total?>" readonly></div>
                    <div class="boton"><a class="boton" type="submit" href="javascript:void(0);" onclick="comprar();">Finalizar Compra</a></div>
                </form>
            </div>
        </content>

        <footer>
            <p>Derechos reservados por la 'Meww Company'</p>
        </footer>

    </body>
</html>