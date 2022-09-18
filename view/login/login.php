<!--autor:ULLOA ESPINOZA STEVEN-->
<?php
require_once 'config/Conexion.php';




//session_start();

?>
<!DOCTYPE html>
<html lang ="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Autor" content="Steven Ulloa Espinoza">
    <title>House Cleaning</title>
    <style>
        head, h1{
            font-family: arial;
            margin: auto;
            text-align: center;
            width:400px;
            margin-top: 50px;
            text-shadow: 0.1em 0.1em 0.2em #000;
            font-size: 80px;
            color: white;

        }
        body{
            font-family: arial;
            background-color: #7cdaf9;
        }
        .form{
            width:400px;
            padding:20px 30px;
            margin: auto;
            margin-top: 100px;
            background-color:  #007bff;
            color: #000;
            box-shadow: 7px 13px 37px #000;
            border-top: 4px solid #017bab;
            color: white;
        }
        .form h2{
            margin: 0;
            text-align: center;
            height: 40px;
            margin-bottom: 30px;
            border-bottom: 1px solid;
            font-size: 20px;
        }
        .form_field{
            width: 100%;
            border: 1px solid #017bab;
            margin-bottom: 15px;
            padding: 11px 10px;
            
            font-size:14px;
            font-weight: bold;
        }

        .form-group{
            font-size:20px;
            font-weight: bold;
            width:100%;
            height:40px;
            margin-bottom: 15px;
            background:  #9c9c9c;
            border: none;
            cursor: pointer;
        }
        a {
            margin-bottom: 10px;
            padding: 5px 5px;
            text-align: center;
            position: relative;
            left: 350px;
            background:  #9c9c9c;
            font-size:14px;
            width:100%;
            height:20px;
            text-decoration:none;
            color: black;
            
        }
    </style>
    
    <script type="text/javascript">

function validar() {
    // variable para retornar
    var valido = true;

    // obtencion de los elementos/ controles de formulario a validar
    var username = document.getElementById("username");
    var contraseña = document.getElementById("contraseña");
   


    // expresiones regulares
    var letra = /^[a-z ,.'-]+$/i;// letrasyespacio   ///^[A-Z]+$/i;// solo letras
    var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    // VALIDACIONES
    //validacion para nombres
    if (username.value === "") {
        valido = false;
        mensaje("Nombre es requerido", username);
    } else if (!letra.test(username.value)) {
        valido = false;
        mensaje("Nombre solo debe contener letras", username);
    } else if (username.value.length > 20) {
        valido = false;
        mensaje("Nombre maximo 20 caracteres", username);
    }
    // lo mismo para apellidos
    if (contraseña.value === "") {
        valido = false;
        mensaje("Contraseña es requerida", contraseña);
    } 
return valido;
}
    </script>
    <h1>House Cleaning</h1>
</head>
<body>
   
    <form action="index.php?c=Login&f=SeleccionarUsuario" method="POST" class="form">
        <h2>Iniciar Sesion</h2>
        <!--<div class="form_field">-->
    <!--<label for="username">Usuario</label>-->
    <input class="form_field" type="text" name="username" id="username"  placeholder="nombre de usuario" >
<!--</div>-->
<!--<div class="form_field">-->
    <!--<label for="contraseña">Contraseña</label>-->
    <input class="form_field" type="password" name="contraseña" id="contraseña"  placeholder="Contraseña" >
<!--</div>-->
    <!--<div class="form-group  col-sm-12"><br>-->
                    <button class="form-group" type="submit" class="btn btn-primary">Ingresar</button>

                    <div class="btn-cancelar">
                    <a href="index.php?c=productos&f=index" class="btn btn-primary" >
                        Cancelar</a>
                    </div>
                
    </form>


</body>
</html>
