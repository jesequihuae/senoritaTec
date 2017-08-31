
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar sesión</title>
    <link href="lib/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="lib/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="lib/assets/css/custom-styles.css" rel="stylesheet" />
    <link href="lib/css/styles.css" rel="stylesheet">
</head>
<body>

    <?php
        session_start();
        if(isset($_SESSION['nombre']) && isset($_SESSION['contrasenia'])){
            header("Location:judges");
        }
    ?>
    <div id="container">

        <div class="row parent">

            <div class="col-xs-12 col-sm-12 col-md-12 mparent">

                <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 epadding2">
                    <p align="center">
                       <img src="lib/img/LogoItsa.png">
                    </p>
                    <h3 align="center" class="mparent2">Inicia sesión<small> juez señorita tec</small></h3>
                </div>

                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 child epadding3">
                    <div class="form-group">
                        <label for="first-name">Correo electrónico <span class="required">*</span></label>
                        <select name="NumeroJuez" class="form-control" id="nombre">
                            <option value="0">Escoge un juez...</option>
                            <option value="juez_1">Juez uno</option>
                            <option value="juez_2">Juez dos</option>
                            <option value="juez_3">Juez tres</option>
                            <option value="juez_4">Juez cuatro</option>
                            <option value="juez_5">Juez cinco</option>
                        </select>
                        <div class="mensaje"></div>
                    </div>

                    <div class="form-group">
                        <label for="first-name">Contraseña <span class="required">*</span></label>
                        <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="contraseña...">
                        <div class="mensaje"></div>
                    </div>

                    <div class="row" align="center">
                        <div class="col-md-4 col-md-offset-2">
                            <button class="btn btn-primary" id="login">Iniciar session</button>
                        </div>
                        <div class="col-md-4">
                            <a href="ganadores" class="btn btn-primary">Lista Candidatas</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 child1 epadding3 mparent2" id="respuesta">
                <p align="center" style="color:black;">Evento señorita tec.</p>
            </div>

        </div>
    </div>
    </div>
</body>
<script src="lib/js/jquery.js"></script>
<script>
    $("#login").on('click',function(e){
        $.ajax({
            url:'php/base_helper_database.php',
            type:'POST',
            data:{
                'operacion':'login',
                'nombre':$("#nombre").val(),
                'contrasenia':$("#contrasenia").val()
            },
            success:function (e) {
               if(e == 'error'){
                   $("#respuesta").addClass('alert alert-danger');
                    $(".mensaje").html('<span class="label label-danger">Fallaste :(...<span>');
               }else{
                   $(location).attr('href','judges');
               }
            }
        });
    });
</script>
</html>