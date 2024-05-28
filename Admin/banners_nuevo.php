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
        <title>Alta de Banners</title>
    </head>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
        function ejecutaAjax()
        {
            var nombre        = $('#nombre').val();
            var archivo       = document.getElementById("archivo").files.length;

            if(nombre == '' || archivo == '0'){
                $("#mensaje").html('Faltan Campos por Llenar');
                setTimeout("$('#mensaje').html('');", 5000);
            }else{
                document.forma01.method = 'post';
                document.forma01.action = 'banners_salva.php';
                document.forma01.submit();
            };
        }

        /*function fueraFoco()
        {
            var id     = $('#id').val();
            var codigo = $('#codigo').val();
            $.post("productos_codigo.php",{codigo:codigo, id:id},   //Atajo de ajax -> $.post(ajax tipo 'post')(url.php, {dato a enviar guardando la informacion de la variable : variable}, funcion(){})
            function(res){
                if(res==1){
                    $("#mensaje1").html('El codigo '+codigo+' ya existe.');
                    $('#codigo').val('');
                }
                setTimeout("$('#mensaje1').html('');", 5000);
            });                     
            
        }*/
        
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
        <form enctype="multipart/form-data" name="forma01" action="banners_salva.php" method="post">
            <div class='layout'>
            <div class='box c1'><b align=center>Alta de banners</b></div>
                <div class='box c1'>Etiqueta: <input type="text" name="nombre" id="nombre" required></div>
                <!--<div class=box>Costo: <input type="text" name="costo" id="costo" required></div>
                <div class=box>Código del producto: <input type="text" name="codigo" id="codigo" onblur="fueraFoco();" required></div>
                <div class=box><div id="mensaje1"></div></div>
                <div class=box>Stock: <input type="text" name="stock" id="stock" required></div>
                <div class=box>Descripción: <input type="text" name="descripcion" id="descripcion" required></div> -->
                <div class='box c1'>Subir foto: <input type="file" id="archivo" name="archivo" required></div>
                <div class='box c1'><div id="mensaje"></div></div>
                <div class='box b1'><a href="javascript:void(0);" class="btn" onclick="ejecutaAjax();">Salvar datos</a></div>
            <tr><td><input value="0" name="id" id="id" hidden></td></tr>
            </div>
        </form>
        </table>
        <?php
        echo "<div class='box b1'><a href=\"banners.php\" class='btn'>Regresar al listado de banners</a></div>"
        ?>
    </body>

</html>