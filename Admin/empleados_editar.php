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

?>

<html>

    <head>
        <title>Editar Empleados</title>
    </head>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
        function ejecutaAjax()
        {
            var id            = $('#id').val();
            var nombre        = $('#nombre').val();
            var apellidos     = $('#apellidos').val();
            var mail          = $('#correo').val();
            var pass          = $('#pass').val();
            var rol           = $('#rol').val();
            var archivo       = document.getElementById("archivo").files.length;

            if(nombre == '' || apellidos =='' || correo=='' || rol=='2'){
                $("#mensaje").html('Faltan Campos por Llenar');
                setTimeout("$('#mensaje').html('');", 5000);
            }else{
                document.forma01.method = 'post';
                document.forma01.action = 'empleados_actualizar.php';
                document.forma01.submit();
            };
        }

        function fueraFoco()
        {
            var id     = $('#id').val();
            var correo = $('#correo').val();
            
            $.post("empleados_correo.php",{correo:correo, id:id},   //Atajo de ajax -> $.post(ajax tipo 'post')(url.php, {dato a enviar guardando la informacion de la variable : variable}, funcion(){})
            function(res){
                if(res==1){
                    $("#mensaje1").html('El correo '+correo+' ya existe.');
                    $('#correo').val('');
                }
                setTimeout("$('#mensaje1').html('');", 5000);
            });                     
            
        }

    </script>

    <style>
        body
        {
            background-image: url("http://drive.google.com/uc?export=view&id=1ZPqMuAFSm6Xcv0RIjfFNrxN4TqwTl_oX");
            background-repeat:no-repeat;
            background-position-x:center;
            background-position-y:center;
            background-size: cover;
        }
        
        #mensaje{
            color: #F00;
            font-size: 16px;
            background: #EFEFEF;
            width: 100%;
            height: 30px;
            text-align: center;
        }

        #mensaje1{
            color: #53A918;
            font-size: 16px;
            background: #EFEFEF;
            width: 110%;
            height: 60px;
            text-align: center;
        }

        .btn
        {
            background-color: #E7E5BF;
            border-radius: 5px;
            border: 1px solid black; 
            padding: 5px;
        }

        .layout
        {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 14.28571% 14.28571% 14.28571% 14.28571% 14.28571% 14.28571% 14.28571%;
            margin: auto auto;
            width: 700px;
            background: rgba(107, 133, 255, .4);
            border-radius: 25px;  
        }

        .box
        {
            display: grid;
            width: 200px;
            height: auto;
            margin: auto auto;
            padding: 30px;
            border-radius: 25px;
        }

        .c1
        {
            grid-column: 1/3;
            width: 500px;
            text-align: center;
        }

        .b1
        {
            grid-column: 1/3;
            width: 400px;
            text-align: center;
        }

        .menu
        {
            display: grid;
            grid-template-columns: 14.28571% 14.28571% 14.28571% 14.28571% 14.28571% 14.28571% 14.28571%;
            margin-top: 60px;
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
        <table>
        <form enctype="multipart/form-data" name="forma01" action="empleados_salva.php" method="post">
        <div class='layout'>
            <div class='box c1'><b align="center">Editar Empleados</b></div>
            <div class='box'>Nombre(s) del usuario: <input value=<?php echo $nombre?> type="text" name="nombre" id="nombre" required></div>
            <div class='box'>Apellido(s) del usuario: <input value=<?php echo $apellidos?> type="text" name="apellidos" id="apellidos" required></div>
            <div class='box'>Correo del usuario: <input value=<?php echo $correo?> type="text" name="correo" id="correo" onblur="fueraFoco();" required></div>
            <div class='box'><div id="mensaje1"></div></div>
            <div class='box'>Contraseña del usuario: <input placeholder="ContraseñaNueva-opcional" type="text" name="pass" id="pass"></div>
            <div class='box'>Rol del usuario:<select name="rol" id="rol" required>
                                        <option value="2" selected>Selecciona</option>
                                        <option value="0">Gerente</option>
                                        <option value="1">Ejecutivo</option>
                                    </select></div>
            <div class='box c1'>Subir foto: <input type="file" id="archivo" name="archivo"></div>      
            <div class='box c1'><div id="mensaje"></div></div>   
            <div class='box c1'><a href="javascript:void(0);" class="btn" onclick="ejecutaAjax();">Salvar datos</a></div>
            <tr><td><input value=<?php echo $id?> name="id" id="id" hidden></td></tr>
        </div>
        </form>
        </table>
        <?php
        echo "<div class='box b1'><a href=\"empleados_lista.php\" class='btn'>Regresar al listado de empleados</a></div>"
        ?>
    </body>

</html>