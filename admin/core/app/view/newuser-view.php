<section class="content">
  <div class="row">
    <div class="col-md-12">
      <h1>Agregar Usuario
        <small>
          <?php
          if (isset($_GET["kind"])) {
            if ($_GET["kind"] == 4) {
              echo "Gerente";
            } else if ($_GET["kind"] == 1) {
              echo "Sub-administrador";
            } else if ($_GET["kind"] == 5) {
              echo "Sub director";
            } else if ($_GET["kind"] == 6) {
              echo "ASM";
            } else if ($_GET["kind"] == 7) {
              echo "Lider de proyecto";
            } else if ($_GET["kind"] == 8) {
              echo "CLO";
            }
          }

          ?>
        </small>

      </h1>
      <br>
      <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addproduct" action="index.php?action=adduser&opt=<?php if ($_GET["kind"] == 1) {
                                                                                                          echo "addAdmin";
                                                                                                        }
                                                                                                        if ($_GET["kind"] == 3) {
                                                                                                          echo "addUser";
                                                                                                        } ?>" role="form">
        <input type="hidden" name="kind" value="<?php echo $_GET["kind"]; ?>">

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
          <div class="col-md-6">
            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
          <div class="col-md-6">
            <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
          <div class="col-md-6">
            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1" class="col-lg-2 control-label">Fono</label>
          <div class="col-md-6">
            <input type="text" name="fono" class="form-control" id="exampleInputEmail1" placeholder="Fono" required>
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-4 control-label">Descripción *</label>
          <div class="col-md-6">
            <textarea name="description" required class="form-control" id="content" placeholder="Descripción "></textarea>
          </div>
        </div>
        </br>
        </br>

        <div class="form-group">
          <label for="exampleInputEmail1" class="col-lg-2 control-label">Formación</label>
          <div class="col-md-6">
            <input type="text" name="formacion" class="form-control" id="exampleInputform1" placeholder="Formación" required>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1" class="col-lg-2 control-label">Especialización</label>
          <div class="col-md-6">
            <input type="text" name="especializacion" class="form-control" id="exampleInputesp1" placeholder="Especialización" required>
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Foto de Perfil *</label>
          <div class="col-md-6">
            <input type="file" name="picture" required>
          </div>
        </div>
        </br>
        </br>

    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
      <div class="col-md-6">
        <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
      </div>
    </div>

    <!--- Aqí va codigo si hay muchas actegorías de usuarios o admins. Esta en la carpeta Recursos->codeTrash.php --->

    <p class="alert alert-info">* Campos obligatorios</p>

    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-primary">Agregar Usuario</button>
      </div>
    </div>
    </form>
  </div>
  </div>
</section>