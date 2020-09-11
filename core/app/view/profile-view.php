<?php

?>
<div class="container">
  <div class="row tabla">
    <div class="col-md-4">
      <h1>Actualizar Perfil</h1>
      </br>

      <div class="panel panel-default">
        <div class="panel-heading">Actualizar datos de Usuario</div>
        <div class="panel-body">

          <form method="post" action="./?action=updateprofile&opt=updateprof" enctype="multipart/form-data">

            <div class="form-group">
              <label for="exampleInputEmail1">Nombre</label>
              <input type="text" name="name" value="<?php echo Core::$user->name; ?>" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Apellidos</label>
              <input type="text" name="lastname" value="<?php echo Core::$user->lastname; ?>" class="form-control" id="exampleInputEmail1" placeholder="Apellidos">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Correo electronico</label>
              <input type="email" name="email" class="form-control" value="<?php echo Core::$user->email; ?>" id="exampleInputEmail1" placeholder="Correo electronico">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Imagen</label>
              <?php if (Core::$user->image != "") : ?>
                <br>
                <img src="./uploads/<?php echo Core::$user->image; ?>" style="width:200px; ">
                <br><br>
              <?php endif; ?>
              <input type="file" name="image">
            </div>

            <button type="submit" class="btn btn-success">Actualizar Datos</button>
          </form>

        </div>
      </div>

      </br>

      <div class="panel panel-default">
        <div class="panel-heading">Cambiar Contraseña</div>
        <div class="panel-body">

          <form method="post" action="./?action=updateprofile&opt=updatepass" enctype="multipart/form-data">

            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password" required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Confirme la contraseña</label>
              <input type="password" name="c-password" class="form-control" id="exampleInputEmail1" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-success">Actualizar Contraseña</button>
          </form>

        </div>
      </div>


    </div>
  </div>
</div>