<section class="content">
  <?php $user = UserData::getById($_GET["id"]); ?>
  <div class="row">
    <div class="col-md-12">
      <h1>Editar Usuario</h1>
      <br>

      <div class="panel panel-default">
        <div class="panel-heading">Actualizar datos de Usuario</div>
        <div class="panel-body">

          <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="index.php?action=updateuser&opt=editusers" role="form">
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
              <div class="col-md-6">
                <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" id="name" placeholder="Nombre">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
              <div class="col-md-6">
                <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" class="form-control" id="lastname" placeholder="Apellido">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
              <div class="col-md-6">
                <input type="text" name="username" value="<?php echo $user->username; ?>" class="form-control" id="username" placeholder="Nombre de usuario">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
              <div class="col-md-6">
                <input type="text" name="email" value="<?php echo $user->email; ?>" class="form-control" id="email" placeholder="Email">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Foto de Perfil *</label>
              <div class="col-md-6">
                <input type="file" name="picture">
              </div>
            </div>
            </br>

            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
              </div>
            </div>

          </form>
        </div>
      </div>


      <div class="panel panel-default">
        <div class="panel-heading">Actualizar datos de Perfil</div>
        <div class="panel-body">

          <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="index.php?action=updateuser&opt=editdat" role="form">
            <div class="form-group">
              <label for="exampleInputEmail1" class="col-lg-2 control-label">Fono</label>
              <div class="col-md-6">
                <input type="text" name="fono" class="form-control" id="exampleInputEmail1" placeholder="Fono">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Descripción *</label>
              <div class="col-md-6">
                <textarea name="description" class="form-control" id="content" placeholder="Descripción "></textarea>
              </div>
            </div>
            </br>
            </br>

            <div class="form-group">
              <label for="exampleInputEmail1" class="col-lg-2 control-label">Formación</label>
              <div class="col-md-6">
                <input type="text" name="formacion" class="form-control" id="exampleInputform1" placeholder="Formación">
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1" class="col-lg-2 control-label">Especialización</label>
              <div class="col-md-6">
                <input type="text" name="especializacion" class="form-control" id="exampleInputesp1" placeholder="Especialización">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Esta activo</label>
              <div class="col-md-6">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" <?php if ($user->status == 1) {
                                                            echo "checked";
                                                          } ?>>
                  </label>
                </div>
                <p class="alert alert-info">* Campo status obligatorio</p>
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
              </div>
            </div>
          </form>
        </div>
      </div>


      <div class="panel panel-default">
        <div class="panel-heading">Actualizar Contraseña</div>
        <div class="panel-body">

          <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="index.php?action=updateuser&opt=editpass" role="form">
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
              <div class="col-md-6">
                <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
                <p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1" class="col-lg-2 control-label">Confirme la contraseña</label>
              <div class="col-md-6">
                <input required type="password" name="c-password" class="form-control" id="exampleInputEmail1" placeholder="Password" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>