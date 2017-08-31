<!DOCTYPE html>
<!-- <html> -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Información</title>
    <link href="../lib/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../lib/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../lib/assets/css/custom-styles.css" rel="stylesheet" />
</head>
<body style="background-color:#f9f9f9;">
    <?php $idCandidata = $_GET['id']; @session_start(); ?>
    <input type="hidden" value="<?php echo $idCandidata; ?>" id="idCandidata">
    <input type="hidden" value="<?php echo $_SESSION['id']; ?>" id="idJuez">
    <?php  $ganadores = 'si';  $operacion = 'candidataEspecifica'; require '../vendor/autoload.php';  require '../conection.php';  require '../php/base_helper_database.php'; ?>
    
    <div id="container"> 
        <?php include('../mod/navbar.php'); ?>   

        <div class="col-lg-10 col-lg-offset-1">
            <!-- <center><h1><small>Califica a NombreParticipante</small></h1></center><br> -->
            <br>
            <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#09192A; color:white;">
                  Participante
                </div>
                <div class="panel-body">
                  <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <center><img src="../resources/img/prueba.png" class="img-responsive"></center>
                  </div>
                  <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top:35px;">
                    <h3>
                      <strong>Nombre: </strong> <?php echo $candidata[0]['nombre'].' '.$candidata[0]['apellidos']; ?> <br><br>
                      <strong>Carrera: </strong> <?php echo $candidata[0]['carrera']; ?> <br><br>
                      <strong>Edad: </strong> <?php echo $candidata[0]['edad']; ?> <br><br>
                      <strong>Color representativo: </strong> <?php echo $candidata[0]['color']; ?>
                    </h3>
                  </div>
                </div>
                <br><br>
              </div>
            </div>

            <pre>
              <div id="mensaje"></div>
            </pre>
            
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default" >
                        <div class="panel-heading" style="background-color:#09192A; color:white;">
                            Calificaciones
                        </div>
                        <div class="panel-body">
                            <!-- <div class="alert alert-danger" style='display:none;' id="mensajeError">
                                      <strong>Rayos!</strong> Existen campos vacíos!.
                            </div> -->
                            <div class="alert alert-danger alert-dismissable" style='display:none;' id="mensajeError">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Rayos!</strong> Existen campos vacíos.
                            </div>
                            <center><h1><small>Click sobre el parametro</small></h1></center><br>
                            <!-- <form> -->
                            <div class="panel-group" id="accordion">
                               <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#Belleza">Belleza</a>
                                        </h4>
                                    </div>
                                    <div id="Belleza" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                          <input type="number" id="belleza" class="form-control" min="0" max="10" placeholder="Ingrese un número de 0 a 10" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#Personalidad" class="collapsed">Personalidad</a>
                                        </h4>
                                    </div>
                                    <div id="Personalidad" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                          <input type="number" id="personalidad" class="form-control" min="0" max="10" placeholder="Ingrese un número de 0 a 10" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#Presentacion" class="collapsed">Presentación</a>
                                        </h4>
                                    </div>
                                    <div id="Presentacion" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <input type="number" id="presentacion" class="form-control" min="0" max="10" placeholder="Ingrese un número de 0 a 10" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#Elegancia" class="collapsed">Elegancia</a>
                                        </h4>
                                    </div>
                                    <div id="Elegancia" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          <input type="number" id="elegancia" class="form-control" min="0" max="10" placeholder="Ingrese un número de 0 a 10" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#PreguntaFinal" class="collapsed">Pregunta final</a>
                                        </h4>
                                    </div>
                                    <div id="PreguntaFinal" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          <input type="number" id="preguntaFinal" class="form-control" min="0" max="10" placeholder="Ingrese un número de 0 a 10" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" align="right">
                              <div class="col-lg-12">
                                <button class="btn btn-danger btn-lg">Regresar</button>
                                <button class="btn btn-success btn-lg" id="enviar">Enviar</button>
                              </div>
                            </div>
                          <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>


    <script src="../lib/assets/js/jquery-1.10.2.js"></script>
    <script src="../lib/assets/js/bootstrap.min.js"></script>
    <script src="../lib/js/jquery.js"></script>
</body>
  <script type="text/javascript">
    $('#enviar').on('click', function(){
      if( $("#belleza").val() == '' || $("#presentacion").val() == '' || $("#preguntaFinal").val() == '' || $("#personalidad").val() == '' || $("#elegancia").val() == ''){
          document.getElementById("mensajeError").style.display = 'block';
          setTimeout(function() { ocultar() },4000);
      }   
      else{
        console.log("entro");
        $.ajax({
          url: '../php/base_helper_database',
          type: 'POST',
          data: {
            'ganadores': 'si',
            'operacion': 'calificar',
            'idCandidata': $("#idCandidata").val(),
            'idJuez': $("#idJuez").val(),
            'belleza': $("#belleza").val(),
            'presentacion': $("#presentacion").val(),
            'preguntaFinal': $("#preguntaFinal").val(),
            'personalidad': $("#personalidad").val(),
            'elegancia': $("#elegancia").val()
          },
          success: function(e){
              $("#mensaje").html(e);
          }
        });
      }   
    }); 

    function ocultar(){ document.getElementById("mensajeError").style.display = 'none'; }
  </script>
</html>
