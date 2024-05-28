<?php
// ini_set('display_errors', 0);
session_start();
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';

if($nombre == '')
{
    $url = "<a href=\"login.php\">Iniciar Sesion</a>";
}else{
    $url = "<a href=\"cerrar_sesion.php\">Cerrar Sesion</a>";
}

?>

<html>

    <head>
        <title>Contacto</title>
        <link href="Css/Encabezado.css" rel="stylesheet" type="text/css">
        <link href="Css/Contacto.css" rel="stylesheet" type="text/css">

        <script src="js/jquery-3.3.1.min.js"></script>
        <script>
            function ejecutaAjax()
            {
                var nombre      = $('#nombre').val();
                var correo      = $('#correo').val();
                var comentario  = $('#comentario').val();

    
                    $.post("funciones/Correo_envio.php",{nombre:nombre, correo:correo, comentario:comentario},
                    function(res){
                        $("#mensaje").html(res);
                        setTimeout("$('#mensaje').html('');", 5000);
                        $('#nombre').val('');
                        $('#correo').val('');
                        $('#comentario').val('');
                    })

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
                <a href=<?php echo "\"productos.php\""?>>Productos</a>
                <a href=<?php echo "\"contacto.php\""?> class="selected">Contacto</a>
                <a href=<?php echo "\"carrito01.php\""?>>Carrito</a>
                <?php
                echo $url;
                ?>
            </nav>
        </header>

        <content>      
            <div class="imagen">
                <img src="Imagenes/Contactanos.png">
            </div>
            <div class="contenedor">
                <form class="formulario" enctype="multipart/form-data" name="form_contacto" method="post">
                    Nombre:<input class="text" name="nombre" id="nombre" requiered>
                    Correo:<input class="text" name="correo" id="correo" requiered>
                    Comentario:<textarea class="text comentario" name="comentario" id="comentario" requiered></textarea>
                    <a class="boton" href="javascript:void(0);" onclick="ejecutaAjax();">Salvar Datos</a>
                </form> 
            </div>
            <div class="mensaje">
                <div class="mensaje_texto" id="mensaje"></div>
            </div>
        </content>
            
        <footer>
            <p>Derechos reservados por la 'Meww Company'</p>
        </footer>

    </body>
</html>