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
              <label for="exampleInputEmail1">Username</label>
              <input type="text" name="username" value="<?php echo Core::$user->username; ?>" class="form-control" id="exampleInputEmail1" placeholder="Username">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Imagen</label>
              <?php if (Core::$user->image != "") : ?>
                <br>
                <img src='./core/app/Recursos/img/<?php echo Core::$user->name; ?><?php echo Core::$user->lastname; ?>/<?php echo Core::$user->image; ?>' style="width:200px; ">
                <br><br>
              <?php endif; ?>
              <input type="file" name="picture">
            </div>
            <input type="hidden" name="id" value="<?php echo $_SESSION["user_id"]; ?>">

            <button type="submit" class="btn btn-success">Actualizar Datos</button>
          </form>

        </div>
      </div>

      </br>

      <div class="panel panel-default">
        <div class="panel-heading">Actualizar perfil</div>
        <div class="panel-body">

          <form method="post" action="./?action=updateprofile&opt=updatedatas" enctype="multipart/form-data">

            <div class="form-group">
              <label for="exampleInputEmail1">Fono</label>
              <input type="text" name="fono" class="form-control" id="exampleInputEmail1" placeholder="Fono">
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-4 control-label">Especialidad</label>
                <input type="text" name="especialidad" class="form-control" id="especialidad" placeholder="Especialidad">
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-4 control-label">Formación</label>
              
                <input type="text" name="formacion" class="form-control" id="formacion" placeholder="Formacion">
              
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-4 control-label">Descripción</label>
              <div class="col-md-6">
                <textarea name="description" class="form-control" id="description" placeholder="Description "></textarea>
              </div>
            </div></br></br></br>

            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            
            <button type="submit" class="btn btn-success">Actualizar perfil</button>
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