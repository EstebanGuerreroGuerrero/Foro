<!--
Este es el layout principal, a partir de este layout o plantilla se muestran el resto de "vistas"
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?= Html::title('Foro Psicologos Temuco'); ?>
  <?= Html::link('res/bootstrap/css/bootstrap.css'); ?>
  <?= Html::link('res/font-awesome/css/fontawesome-all.min.css'); ?>
  <?= Html::script('res/js/jquery.min.js'); ?>


</head>

<body>
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <img src="./res/img/logo1.png" class="logo">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="./"><b>Foro Psicologos Temuco</b></a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="./">INICIO</a></li>
          <?php if (!isset($_SESSION["user_id"])) : ?>
            <li><a href="./?view=login">LOGIN</a></li>
            <li><a href="./?view=register">REGISTRO</a></li>
          <?php endif; ?>
          <li><a href="https://psicologostemuco.com/">PSICÓLOGOS TEMUCO</a></li>  
        </ul>

        <?php if (isset($_SESSION["user_id"])) : ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><?php echo Core::$user->name . " " . Core::$user->lastname; ?></b> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?view=home">Mis publicaciones</a></li>
                <li><a href="./?view=saveposts">Publicaciones Guardadas</a></li>
                <li><a href="./?view=profile">Editar Perfil</a></li>
                <li role="separator" class="divider"></li>
                
                <?php 
                if (isset($_SESSION["user_id"])):
                $type = UserData::getById($_SESSION["user_id"]);
                  if ($type->type == 1 || $type->type == 2) : ?>
                    <li><a href="http://localhost/forus/master_foro/admin/">Módulo de administrador</a></li>
                  <?php endif; ?>
                <?php endif; ?> 

                <li><a href="./?action=access&o=logout">Salir</a></li>
              </ul>
            </li>
          </ul>
        <?php endif; ?>

      </div>
    </div>
  </nav>


  <?php
  View::load("themes");
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <br>
        <hr>
        <p class="text-muted text-center">Foro psicologos Temuco v0.01</p>
      </div>
    </div>
  </div>
  <?= Html::script('res/bootstrap/js/bootstrap.min.js'); ?>
  <?= Html::script('res/js/likes2.js'); ?>
  <?= Html::link('res/css/styles.css'); ?>
  <?= Html::link('res/css/styles2.css'); ?>
</body>

</html>