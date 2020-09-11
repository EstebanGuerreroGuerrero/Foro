<div class="container">
  <div class="row">
    <h1 class="text-center">Recupera tu contraseña</h1></br></br>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading text-center">Ingresa tu dirección Email</div>
            <div class="panel-body">

              <form method="post" action="./?action=access&o=sendrec">

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Nombre de usuario" required>
                </div>

                <button type="submit" class="btn btn-success">Enviar</button></br></br>

              </form>

            </div>
          </div>
        </div>


      </div>
      <?php
      //$user = UserData::getBy("id",2);
      //$user->del();
      //print_r($user);
      ?>

    </div>
  </div>
</div>