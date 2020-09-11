<section class="content">
<div class="row">
	<div class="col-md-12">
		<h1>Temas</h1>


<!-- Button trigger modal -->
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
Nuevo Tema
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Tema</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addtheme" action="index.php?action=themes&opt=add" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Descripción *</label>
    <div class="col-md-6">
      <textarea name="content" required class="form-control" id="content" placeholder="Contenido "></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Imagen destacada (1920x1080)*</label>
    <div class="col-md-6">
      <input type="file" name="image" >
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Tema</button>
    </div>
  </div>
</form>

      </div>

    </div>
  </div>
</div>


<br>
<br>
		<?php

		$users = ThemeData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
<div class="box box-primary">
<div class="box-body">
			<table class="table table-bordered table-hover datatable">
			<thead>
			<th>Tema</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td style="width:130px;">

<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $user->id; ?>">
Editar
</button>
<a href="index.php?action=themes&opt=del&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}

				?>
				</table>
<?php foreach($users as $user):?>
<!-- Modal -->
<div class="modal fade" id="editModal<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Tema</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=categories&opt=update" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tema*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Tema">
    </div>
  </div>




  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Tema</button>
    </div>
  </div>
</form>

      </div>

    </div>
  </div>
</div>
<?php endforeach; ?>
				</div>
				</div>
				<?php


		}else{
			echo "<p class='alert alert-danger'>No hay Temas aún</p>";
		}


		?>


	</div>
</div>

</section>