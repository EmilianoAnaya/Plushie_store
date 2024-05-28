<?php
ini_set('display_errors', 0);
session_start();
$nombre = $_SESSION['nombre'];

if($nombre != '')
{
    header("Location: bienvenido.php");
}

?>

<html>
    <head>
        <title>Login</title>
    
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script>
            function valida()
            {
                var correo = document.Forma01.correo.value; //Guardara lo que el correo tiene en el campo de nombre, esto usa el "name" en vez del "id"
                var password = document.Forma01.password.value;

                /*var correos = Array('Rubén', 'Juan', 'Pedro', 'Luis');
                var pass = Array('1234', 'admin', 'abcd', 'password');*/
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
                                window.location.href = "bienvenido.php";
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
        <style>
        body
        {
            background-image: url("http://drive.google.com/uc?export=view&id=1FoRk24qyBJjwk7UPk1mB2rbHau-_YZw5");
            background-repeat:no-repeat;
            background-position-x:center;
            background-position-y:center;
            background-size: cover;
        }

        .layout
        {
            display: grid;
            width: 396px;
            height: 314px;
            background-color: whitesmoke;
            grid-template-rows: 30% 30% 30% 10%;
            border-radius: 25px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -200px;
        }
        
        .box
        {
            display: grid;
            width: 250px;
            height: 60%;
            margin: auto auto;
            padding: 5px;
            background-color: whitesmoke;
            border-radius: 25px;
        }

        .c1
        {
            display: grid;
            border-radius: 5px;
            background-color: whitesmoke;
        }

        #mensaje
        {
            color: #f00;
            text-align: center;
            display: grid;
            width: 250px;
            height: 60%;
            margin: auto auto;
            padding: 5px;
            background-color: #EAEAEA;
            border-radius: 5px;
        }

        #fondo
        {
            float: left;
            shape-outside: url("si.png");
        }

    </style>
    </head>
    

    <body>
    <?php
    echo "<div class='layout'>";
        echo "<form name='Forma01' method='post' action='recibe.php'>";
            
            echo "<div class='box'><p align='center'>LOGIN</p></div>";
            echo "<div class='box'><input class='c1' type='text' name='correo' id='correo' placeholder='Correo'/></div>";
            echo "<div class='box'><input class='c1' type='text' name='password' id='password' placeholder='Password'/></div>";
            echo "<div id=mensaje></div>";

        echo "<div class='box'><input onclick='valida(); return false;' type='submit' value='Enviar'/></div>";
        echo "</form>";
    echo "</div>";
    ?>
    </body>