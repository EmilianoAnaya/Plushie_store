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
if(!empty($_REQUEST["nume"]))
{
    $_REQUEST["nume"] = $_REQUEST["nume"];
}else{ 
    $_REQUEST["nume"] = '1';
}
if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
$articulos=mysqli_query($con,"SELECT * FROM productos WHERE status = 1 AND eliminado = 0;");
$num_registros=mysqli_num_rows($articulos);
$registros= '9';
$pagina=$_REQUEST["nume"];
if (is_numeric($pagina))
$inicio= (($pagina-1)*$registros);
else
$inicio=0;
$busqueda=mysqli_query($con,"SELECT * FROM productos WHERE status = 1 AND eliminado = 0 LIMIT $inicio,$registros;");
$paginas=ceil($num_registros/$registros);
?>
<html>

    <head>
        <title>Productos</title>
        <link href="Css/Encabezado.css" rel="stylesheet" type="text/css">
        <link href="Css/Lista_Productos.css" rel="stylesheet" type="text/css">
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
                <a href=<?php echo "\"home.php\""?>>Home</a>
                <a href=<?php echo "\"productos.php\""?> class="selected">Productos</a>
                <a href=<?php echo "\"contacto.php\""?>>Contacto</a>
                <a href=<?php echo "\"carrito01.php\""?>>Carrito</a>
                <?php
                echo $url;
                ?>
            </nav>
        </header>

        <content>
        <div class="contenedor">
            <?php
                
                while($row = mysqli_fetch_assoc($busqueda))
                {
                    $nombre       = $row['nombre'];
                    $costo        = $row['costo'];
                    $archivo      = $row["archivo"];
                    $idP           = $row["id"];
                    echo '<div class="producto c1">';
                        echo '<div class="imagen">';
                            echo "<img src=\"Admin\archivos/$archivo\">";
                        echo '</div>';
                        echo '<div class="descripcion">';
                            echo '<div class="text nombre">'."$nombre".'</div>';
                            echo '<div class="text price">'."$$costo".'</div><br>';
                            echo '<div class="text"><a class="btn" '."href=\"detalle_producto.php?id=$idP\"".'>Ver Producto</a></div><br>';
                            echo '<div class="text" '.$carrito.'><a class="btn" '."onclick='agregarProducto($idP)';".'>Agregar al Carrito</a></div>';
                            echo '<div class="text" hidden><input value='."$idP".'></div>';
                            echo '<input type="text" value="1" id="cantidad" hidden>';
                        echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
        <div class="paginador">
            <?php
              if($_REQUEST["nume"] == "1" ){
                $_REQUEST["nume"] == "0";
                echo  "";
                }else{
                if ($pagina>1)
                $ant = $_REQUEST["nume"] - 1;
                echo "<div class='caja'><a class='select' href='productos.php?nume=1'>Primero</a></div>"; 
                echo "<div class='caja num'><a class='select' href='productos.php?nume=".($pagina-1)."'>".$ant."</a></div>"; }
                echo "<div class='caja num active'><a class='select slct' href=''>".$_REQUEST["nume"]."</a></div>"; 
                $sigui = $_REQUEST["nume"] + 1;
                $ultima = $num_registros / $registros;
                if ($ultima == $_REQUEST["nume"] +1 ){
                $ultima == "";}
                if ($pagina<$paginas && $paginas>1){
                echo "<div class='caja num'><a class='select' href='productos.php?nume=".($pagina+1)."'>".$sigui."</a></div>"; 
                echo "<div class='caja'><a class='select' href='productos.php?nume=".ceil($ultima)."'>Ultimo</a></div>";    }  
            ?>
        </div>
        </content>

        <footer>
            <p>Derechos reservados por la 'Meww Company'</p>
        </footer>

    </body>
</html>