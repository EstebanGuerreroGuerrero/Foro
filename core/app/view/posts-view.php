<?php
$cat = CategoryData::getById($_GET["id"]);
$jobs  = PostData::getAllByCat($cat->id);
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Artículos en <?php echo $cat->name; ?></h1>

      <?php if (Core::$user != null) : ?>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
          Nuevo Artículo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Artículo</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addcategory" action="index.php?action=posts&opt=add" role="form">


                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-4 control-label">Título*</label>
                    <div class="col-md-6">
                      <input type="text" name="title" required class="form-control" id="title" placeholder="Titulo">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-4 control-label">Contenido *</label>
                    <div class="col-md-6">
                      <textarea name="content" required class="form-control" id="content" placeholder="Contenido "></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-4 control-label">Imagen destacada (1920x1080)*</label>
                    <div class="col-md-6">
                      <input type="file" name="picture">
                    </div>
                  </div>


                  <input type="hidden" name="category_id" value="<?php echo $_GET["id"]; ?>">

                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" class="btn btn-primary">Agregar Artículo</button>
                    </div>
                  </div>
                </form>

              </div>

            </div>
          </div>
        </div>
      <?php endif; ?>
      <br><br>
      <div class="panel panel-default">
        <div class="panel-heading">Artículos en <?php echo $cat->name; ?></div>
        <div class="panel-body">

          <?php if (count($jobs) > 0) : ?>

            <table class="table">
              <?php foreach ($jobs as $jb) :
                $u = UserData::getById($jb->user_id);
              ?>

                <tr>

                  <td style="width: 200px; ">
                    <?php if ($jb->image != "") : ?>
                      <img src='./core/app/Recursos/img/<?php echo $jb->user_id; ?>/<?php echo $jb->image; ?>' class="img-responsive" style="width: 200px; ">
                    <?php else : ?>
                      <img src='./core/app/Recursos/img/general/Psychology.jfif' class="img-responsive" style="width: 200px;">
                    <?php endif; ?>
                  </td>

                  <td>
                    <h4><a href="./?view=post&id=<?php echo $jb->id; ?>"><?php echo $jb->title; ?></a></h4>
                    <p>por <b><?php echo $u->name . " " . $u->lastname; ?></b></p>
                    <p class="text-muted"><?php echo $jb->created_at; ?></p>
                  </td>

                  <?php if (Core::$user != null) : ?>
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" id="savepost" action="index.php?action=savepost&opt=save" role="form">

                      <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>">
                      <input type="hidden" name="post_id" value="<?php echo $jb->id; ?>">
                      <td>
                        <button type="submit" class="btn btn-info" data-target="#myModal">
                          Guardar publicación
                        </button>

                        <?php
                        if ($u->id == $_SESSION["user_id"]) : ?>
                          <a href="index.php?action=posts&opt=delpost&id=<?php echo $jb->id; ?>" class="btn btn-danger">Eliminar</a></td>
                    <?php endif; ?>

                    </td>
                    </form>

                  <?php endif; ?>
                </tr>

              <?php endforeach; ?>
            </table>
          <?php else : ?>
            <p class="alert alert-warning">No hay artículos publicados por el momento!</p>
          <?php endif; ?>

        </div>
      </div>

    </div>
  </div>
</div>
<br><br><br><br>