<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <div class="navbar-brand" href="#"><?php @session_start(); echo $_SESSION['nombre']; ?></div>
        <?php
        if(!isset($_SESSION['nombre']) && !isset($_SESSION['contrasenia'])){
            header("Location:../");
            session_destroy();
        }
        ?>
    </div>
  <ul class="nav navbar-top-links navbar-right">
   <li class="dropdown">
     <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
      <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
     </a>
     <ul class="dropdown-menu dropdown-user">
    <li><a href="../php/base_helper_database.php?operacion=logout"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a></li>
   </ul>
   </li>
   </ul>
</nav>