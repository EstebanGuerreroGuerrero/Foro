<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Registro de usuarios</h1>
      <div class="panel panel-default">
        <div class="panel-heading">Registro de usuarios</div>
        <div class="panel-body">

          <form enctype="multipart/form-data" method="post" action="./?action=processregister">
            <div class="form-group">
              <label for="exampleInputEmail1">Nombre</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nombre" required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Apellidos</label>
              <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" placeholder="Apellidos" required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Correo electronico</label>
              <input type="email" name="email" required class="form-control" id="exampleInputEmail1" placeholder="Correo electronico">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Fono</label>
              <input type="text" name="fono" class="form-control" id="exampleInputEmail1" placeholder="Fono" required>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-4 control-label">Descripción *</label>
              <div class="col-md-6">
                <textarea name="description" required class="form-control" id="content" placeholder="Descripción "></textarea>
              </div>
            </div>
            </br>
            </br>
            </br>

            <div class="form-group">
              <label for="exampleInputEmail1">Formación</label>
              <input type="text" name="formacion" class="form-control" id="exampleInputform1" placeholder="Formación" required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Especialización</label>
              <input type="text" name="especializacion" class="form-control" id="exampleInputesp1" placeholder="Especialización" required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" name="password" required class="form-control" id="exampleInputEmail1" placeholder="Password">
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-4 control-label">Foto de Perfil *</label>
              <div class="col-md-6">
                <input type="file" name="picture" required>
              </div>
            </div>
            </br>
            </br>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="accept" required> Acepto los terminos y condiciones
              </label>
            </div>
            <button type="submit" class="btn btn-default">Registrarme</button>
          </form>

        </div>
      </div>







    </div>
  </div>
</div>
<br><br><br><br>