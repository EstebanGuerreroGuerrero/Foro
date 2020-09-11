<?php
		$theme_id = $_GET['id'];
		$theme = ThemeData::getById($theme_id);
		$cats = CategoryData::getByTheme($theme_id);
?>

<link rel="stylesheet" href="./res/css/styles2.css">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="h1-text">
				Bienvenido al Foro de Psicologos Temuco
			</h3>
			</br>
			<p style="text-align:center;" class="lead">
				Estos son nuestros Temas correspondientes a: <strong><?php echo $theme->name; ?></strong>
			</p>
			</br>
		</div>
	</div>

	<?php
		if (count($cats) > 0) :
	?>

	<div class="row">
			<?php
			foreach ($cats as $cat) : ?>
				<div class="col-sm-6">
					<div class="panel panel-primary" id="panel-categoria">
						<div class="panel-heading text-center">
							<a id="titulo-categoria" href="./?view=posts&id=<?php echo $cat->id; ?>">
								<?php echo $cat->name; ?>
							</a>
						</div>
						<div class="panel-body">
							<p class=""><?php echo $cat->description; ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else : ?>
			<p class="alert alert-warning">No hay categorias</p>
		<?php endif; ?>
	</div>
</div>
<br><br><br><br>
