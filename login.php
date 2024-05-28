<?php

session_start();
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';


if($nombre != '')
{
    header("Location: home.php");
}

?>

<html>

    <head>
        <title>Inicio de Sesion</title>
        <link href="Css/Encabezado.css" rel="stylesheet" type="text/css">
        <link href="Css/login.css" rel="stylesheet" type="text/css">

        <script src="js/jquery-3.3.1.min.js"></script>
        <script>
            function ejecutaAjax()
            {
                var password      = $('#password').val();
                var correo      = $('#correo').val();

                if(correo == '' || password == '')  
                {
                    $("#mensaje").html('Faltan Campos por Llenar');
                    setTimeout("$('#mensaje').html('');", 2500);
                }
                else
                {
                    $.ajax({
                        url     : 'funciones/validarUsuario.php',
                        type    : 'post',
                        dataType: 'text',
                        data    : 'correo='+correo+'&password='+password,
                        success : function(res){
                            if(res == 1){
                                window.location.href = "home.php";
                            }else{
                                $("#mensaje").html('Usuario no existente');
                                setTimeout("$('#mensaje').html('');", 2500);
                            }
                        },error: function(){
                            $("#mensaje").html('Error al consultar al servidor...');
                            setTimeout("$('#mensaje').html('');", 2500);
                        } 
                    });//Termina Ajax()
                   
                    
                   
                }

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
                <a href=<?php echo "\"contacto.php\""?>>Contacto</a>
                <a href=<?php echo "\"carrito01.php\""?>>Carrito</a>
                <a href=<?php echo "\"login.php\""?>  class="selected">Iniciar Sesion</a>
            </nav>
        </header>

        <content>      
            <div class="imagen">
                <img src="Imagenes/Contactanos.png">
            </div>
            <div class="contenedor">
                <form class="formulario" enctype="multipart/form-data" name="form_contacto" method="post">
                    Correo:<input class="text" name="correo" id="correo" requiered>
                    Contraseña<input class="text" name="password" id="password" requiered>
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