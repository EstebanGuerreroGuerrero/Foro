<?php
  $jb  = PostData::getById($_GET["id"]);
  $img = FilesData::getById($jb->id);
  $carpet = FilesData::getAllById($jb->id);
  $user = UserData::getById($jb->user_id);
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1><?php echo $jb->title; ?></h1>
      <?php if ($jb->image != "") : ?>
      
      <?php endif; ?>
      <br>
      <div class="panel panel-default">
        <div class="panel-body">
          <label>Contenido</label>
          <p><?php echo $jb->content; ?></p>
          <label>Categoria</label>
          <p><a href="./?view=posts&id=<?php echo $jb->category_id; ?>"><?php echo CategoryData::getById($jb->category_id)->name; ?></a></p>
          <label>Creador</label>
          <p><b><a href="./?view=friendprofile&id=<?php echo $user->id; ?>"><?php echo $user->username; ?></a></b></p>

          <?php if (count($carpet) > 0) : ?>

            <!-- Button trigger modal ----------------------------------------------------------------------------------->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
              Ver Archivos adjuntos
            </button>

            <!-- Modal View FILES-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Archivos e Imagenes</h4>
                  </div>
                  <div class="modal-body">

                    <div>
                      <label for="inputEmail1" class="control-label">Imagenes*</label>
                      <div>
                        <div class="imagen-container">
                          <img class="imagen" src='./core/app/Recursos/img/<?php echo $img->user_id; ?>/<?php echo $img->post_id; ?>/<?php echo $img->image; ?>' alt="Ejemplo de texto" />
                          <form><input type="button" class="btn btn-primary " value="Abrir" onClick="window.location.href='./core/app/Recursos/img/<?php echo $img->user_id; ?>/<?php echo $img->post_id; ?>/<?php echo $img->image; ?>'"></form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr />

                  <!-- <label for="inputEmail1" class="control-label">-   RAR Descargable*</label>
                    <ul>
                      <li>
                      <a href="./core/app/Recursos/files/<?php echo $img->user_id; ?>/<?php echo $img->post_id; ?>/<?php echo $img->rar; ?>" download>Documento.Rar: <?php echo $img->rar; ?></a>
                      </li>
                    </ul> -->
                  <hr />


                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-4 control-label">PDF *</label>

                    <div class="file-container">
                      <embed class="file" src="./core/app/Recursos/files/<?php echo $img->user_id; ?>/<?php echo $img->post_id; ?>/<?php echo $img->file; ?>" type="application/pdf" />
                      <form><input type="button" class="btn btn-primary btn-block" value="Abrir" onClick="window.location.href='./core/app/Recursos/files/<?php echo $img->user_id; ?>/<?php echo $img->post_id; ?>/<?php echo $img->file; ?>'"></form>
                    </div>
                    <hr />

                  </div>
                </div>

              </div>
            </div>
        </div>

      <?php else : ?>
        <p class="alert alert-warning">Aun no hay archivos adjuntos</p>

        <?php if (Core::$user != null) : ?>
          <?php
              if ($jb->user_id == $_SESSION['user_id']) :
          ?>
            <p class="alert alert-info">Puedes agregar archivos solo 1 vez..</p>

            <form class="form-horizontal" enctype="multipart/form-data" method="post" id="addcfile" action="index.php?action=posts&opt=newfile" role="form">
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Imagen destacada (1920x1080)*</label>
                <div class="col-md-6">
                  <input type="file" name="image">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-4 control-label">Adjuntar Archivo PDF *</label>
                <div class="col-md-6">
                  <input type="file" name="archivo">
                </div>
              </div>

              <!-- <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Adjuntar Archivo RAR *</label>
    <div class="col-md-6">
      <input type="file" name="rar" >
    </div>
  </div> -->

              <input type="hidden" name="category_id" value="<?php echo $_GET["id"]; ?>">
              <input type="hidden" name="title" value="<?php echo $jb->title ?>">
              <input type="hidden" name="post_id" value="<?php echo $jb->id ?>">


              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button type="submit" class="btn btn-primary">Agregar Articulo</button>
                </div>
              </div>

            </form>
          <?php endif; ?>
        <?php endif; ?>

      <?php endif; ?>

      <!-- END View FILES----------------------------------------------------------------->




      </div>
    </div>
    <?php if (Core::$user != null) : ?>
      <div class="panel panel-default">
        <div class="panel-heading">Escribir comentario</div>
        <div class="panel-body">

          <form method="post" action="./?action=send" enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="<?php echo $jb->id; ?>">


            <div class="form-group">
              <label for="exampleInputEmail1">Comentarios</label>
              <textarea name="comment" class="form-control" id="exampleInputEmail1" placeholder="Comentarios" required rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-default">Enviar Comentario</button>
          </form>

        </div>
      </div>
    <?php endif;  ?>



    <?php
    $comments  = CommentData::getPublicByPost($jb->id);
    ?>
    <?php if (count($comments) > 0) : ?>
      <div class="panel panel-default">
        <div class="panel-heading">Comentarios</div>
        <div class="panel-body">


          <?php foreach ($comments as $com) :
            $uc = UserData::getById($com->user_id);
          ?>


            <p><?php echo $com->comment; ?></p>
            <p>por <b><?php echo $uc->name . " " . $uc->lastname; ?></b></p>
            <p class="text-muted"><?php echo $com->created_at; ?></p>
            </br>

            <?php if (Core::$user != null) : ?>
              <?php if ($com->user_id == $_SESSION["user_id"]) : ?>
                <a href="index.php?action=posts&opt=delcom&id=<?php echo $com->id; ?>" class="btn btn-danger btn-xs">Eliminar</a></td>
              <?php endif; ?>
            <?php endif; ?>

            <hr>
          <?php endforeach; ?>
        </div>
      </div>
    <?php else : ?>
      <p class="alert alert-warning">No hay comentarios</p>
    <?php endif; ?>


  </div>
</div>
</div>
<br><br><br><br>