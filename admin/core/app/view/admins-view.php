<?php	$u = UserData::getById($_SESSION["user_id"]);
		$admin = UserData::getById($_SESSION['user_id']); ?>
<?php if ($u->kind == 1) : ?>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<h1>Lista de Administradores</h1>
				<!-- Single button -->
				<?php if($admin->type == 1): ?>
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Nuevo <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="./?view=newuser&kind=1">Administrador </a></li>
					</ul>
				</div>
				<?php endif; ?>
				<br><br>
				<?php
				/*
		$u = new UserData();
		print_r($u);
		$u->name = "Agustin";
		$u->lastname = "Ramos";
		$u->email = "evilnapsis@gmail.com";
		$u->password = sha1(md5("l00lapal00za"));
		$u->add();


		$f = $u->createForm();
		print_r($f);
		echo $f->label("name")." ".$f->render("name");
		*/
				?>
				<?php
				$users = UserData::getAllAdmins();
				if (count($users) > 0) {
					// si hay usuarios
				?>
					<div class="box box-primary">
						<div class="box-body">
							<table class="table table-bordered table-hover datatable">
								<thead>
									<th>Nombre completo</th>
									<th>Email</th>
									<th>Activo</th>
									<th></th>
									<th></th>
								</thead>
								<?php
								foreach ($users as $user) {

								?>
									<tr>
										<td><?php echo $user->name . " " . $user->lastname; ?></td>
										<td><?php echo $user->email; ?></td>
										<td>
											<?php if ($user->status == 1) : ?>
												<i class="glyphicon glyphicon-ok"></i>
											<?php endif; ?>
										</td>
										<td>
											<?php if ($admin->type == 1) : ?>
												<?php if ($user->type != 2) : ?>
													<?php if ($user->type == 1) : ?>

													<?php else : ?>
														<a href="index.php?action=updateuser&opt=giveAdm&id=<?php echo $user->id; ?>" class="btn btn-info btn-xs">Dar adm</a>
													<?php endif; ?>
												<?php else : ?>
													<a href="index.php?action=updateuser&opt=leaveAdm&id=<?php echo $user->id; ?>" class="btn btn-info btn-xs">Quitar adm</a>
												<?php endif; ?>
											<?php endif; ?>
										</td>
										<td style="width:175px;">
											<?php if ($admin->type == 1) : ?>
												<a href="index.php?view=edituser&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>
												<?php if ($user->type != 1) : ?>
													<a href="index.php?action=deluser&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs">Eliminar</a>
												<?php endif; ?>
											<?php endif; ?>

										</td>
									</tr>
							<?php

								}
								echo "</table></div></div>";
							} else {
								// no hay usuarios
							}


							?>


						</div>
					</div>
	</section>
<?php endif; ?>