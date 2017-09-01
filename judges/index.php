<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Concursantes</title>
    <link href="../lib/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../lib/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../lib/assets/css/custom-styles.css" rel="stylesheet" />
</head>
<body>
    <?php  $ganadores = 'si';  $_REQUEST['operacion'] = 'candidatasAll'; require '../vendor/autoload.php';  require '../conection.php';  require '../php/base_helper_database.php'; ?>

    <div id="container">
        <?php include('../mod/navbar.php'); ?>
        <div class="col-lg-12">
            <center><h1><small>Selecciona una participante</small></h1></center>
            <div id="mensaje"></div>
            <div class="row">
              <?php foreach ($lista as $candidata){ ?>
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <br>
                <a href="info.php?id=<?php echo $candidata['idcandidata']; ?>">
                  <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body">
                      <center>
                      <img src="../lib/img/<?php echo $candidata['image']; ?>" class="img-responsive" style="width: 177px; height: 246px !important;">
                      </center>
                    </div>
                    <div class="panel-footer" style="background-color:<?php echo $candidata['color'];?>; color:black;">
                     <div width="100%" >
                       <div align="left" style="float:left;"><?php echo $candidata['nombre']; ?></div>
                       <div align="right">Color: <?php echo $candidata['color_show']; ?></div>
                     </div>                   
                    </div>
                  </a>
                </div>
              </div>
              <?php } ?>
            </div>
        </div>
    </div>
    <script src="../lib/assets/js/jquery-1.10.2.js"></script>
    <script src="../lib/assets/js/bootstrap.min.js"></script>
    <script src="../lib/assets/js/jquery.metisMenu.js"></script>
    <script src="../lib/assets/js/custom-scripts.js"></script>
    <script src="../lib/js/jquery.js"></script>
</body>
    <script type="text/javascript">
      // $(document).ready(function(){
      //   $.ajax({
      //     url:'../php/base_helper_database.php',
      //     type:'POST',
      //     data:{
      //           'operacion':'candidatasAll'
      //       },
      //     success: function(e){
      //       if(e == 'error'){
      //         console.log("error");
      //       } else {
      //         window.
      //       }
      //     }
      //   });
      // });
    </script>
</html>
