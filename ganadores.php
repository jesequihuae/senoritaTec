<!doctype html><html lang="en"><head>    <meta charset="UTF-8">    <meta name="viewport"          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    <meta http-equiv="X-UA-Compatible" content="ie=edge">    <title>Lista de candidatas</title>    <link rel="stylesheet" href="lib/assets/css/bootstrap.css">    <link rel="stylesheet" href="lib/css/styles.css">    <link rel="stylesheet" href="lib/assets/css/font-awesome.css"></head><body>    <?php       $_REQUEST['ganadores'] = "si";        $operacion = 'listacandidatas';        require 'vendor/autoload.php';        require 'conection.php';        require 'php/base_helper_database.php';    ?>    <div style="position: fixed; margin: 20px;">        <a href="index.php" data-toggle="tooltip" title="Inicio!">            <i class="fa fa-arrow-left fa-5x" aria-hidden="true"></i>        </a>    </div>    <div style="position: fixed; margin: 20px; margin-left: 90% !important;">        <a href="pdf" data-toggle="tooltip" title="Reporte general!">            <i class="fa fa-list-alt fa-5x" aria-hidden="true"></i>        </a>    </div>    <?php foreach ($candidatas as $c):?>            <?php                $calificacion = 0;                $dividir = $obj->contarJueces()*5;                foreach ($c['calificacion'] as $cal){                    $calificacion += $cal['calificacion'];                    }            ?>    <div class="col-md-8 col-md-offset-2 paddinTop child" style="border-bottom: 10px solid <?php echo $c['color']; ?>;">        <div class="col-md-2">            <img src="lib/img/<?php echo $c['image']; ?>" width="100px"/>        </div>        <div class="col-md-5">            <div class="row">                <div class="col-md-12">                    <h3 class="padd"><small><i class="fa fa-female" aria-hidden="true"></i> Nombre: </small><?php echo $c['nombre']; ?></h3>                </div>                <div class="col-md-12">                    <h3 class="padd" style="padding-top: 12px;"><small><i class="fa fa-female" aria-hidden="true"></i> Apellidos: </small><?php echo $c['apellidos']; ?></h3>                </div>                <div class="col-md-12">                    <h3 class="padd"><small><i class="fa fa-graduation-cap" aria-hidden="true"></i> Carrera:</small> <?php echo $c['carrera']; ?></h3>                </div>                <div class="col-md-12">                    <h3 class="padd"><small><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Calificación:</small> <?php echo ($dividir==0)?0:($calificacion/$dividir);?></h3>                </div>            </div>        </div>        <div class="col-md-2 ">            <div class="row">                <div class="col-md-12 padd">                    <h1 align="center"><?php echo ($dividir==0)?'0.0':($calificacion/$dividir);?> <small> Puntos</small></h1>                </div>                <div class="col-md-12">                    <a href="pdfPersonal.php?can=<?php echo $c['idcandidata']; ?>" class="btn btn-info">Ver reporte</a>                </div>            </div>        </div>        <div class="col-md-2">            <div id="color" style="background-color: <?php echo $c['color'];?>">            </div>        </div>        </div>        <div class="col-md-12 line_botton">        </div>    </div>    <?php endforeach; ?></body><script src="lib/js/jquery.js"></script><script src="lib/assets/js/bootstrap.min.js"></script><script>        $('[data-toggle="tooltip"]').tooltip();</script></html>