<!doctype html><html lang="en"><head>    <meta charset="UTF-8">    <meta name="viewport"          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    <meta http-equiv="X-UA-Compatible" content="ie=edge">    <title>Document</title>    <link rel="stylesheet" href="lib/assets/css/bootstrap.css" />    <link rel="stylesheet" href="lib/css/styles.css">    <link rel="stylesheet" href="lib/assets/css/font-awesome.css"></head><body>    <?php        $ganadores = 'si';        $operacion = 'listacandidatas';        require 'vendor/autoload.php';        require 'conection.php';        require 'php/base_helper_database.php';    ?>    <pre>    <?php foreach ($candidatas as $c):?>            <?php                $calificacion = 0;                $dividir = 0;                foreach ($c['calificacion'] as $cal){                    $calificacion += $cal['calificacion'];                    $dividir++;                }            ?>          </pre>    <div class="col-md-8 col-md-offset-2 paddinTop child">        <div class="col-md-2">            <img src="lib/img/LogoItsa.png" width="100px"/>        </div>        <div class="col-md-5">            <div class="row">                <div class="col-md-12">                    <h3 class="padd"><small><i class="fa fa-female" aria-hidden="true"></i> Nombre: </small><?php echo $c['nombre']; ?></h3>                </div>                <div class="col-md-12">                    <h3 class="padd"><small><i class="fa fa-graduation-cap" aria-hidden="true"></i> Carrera:</small> <?php echo $c['carrera']; ?></h3>                </div>                <div class="col-md-12">                    <h3 class="padd"><small><i class="fa fa-location-arrow" aria-hidden="true"></i> Color:</small> <?php echo $c['color']; ?></php></h3>                </div>                <div class="col-md-12">                    <h3 class="padd"><small><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Calificación:</small> <?php echo ($dividir==0)?0:($calificacion/$dividir);?></h3>                </div>            </div>        </div>        <div class="col-md-2 ">            <div class="row">                <div class="col-md-12 padd">                    <h1 align="center"><?php echo ($dividir==0)?'0.0':($calificacion/$dividir);?> <small> Puntos</small></h1>                </div>            </div>        </div>        <div class="col-md-2">            <div id="color">            </div>        </div>        </div>        <div class="col-md-12 line_botton">        </div>    </div>    <?php endforeach; ?></body></html>