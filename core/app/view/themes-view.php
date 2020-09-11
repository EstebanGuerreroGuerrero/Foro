<link rel="stylesheet" href="./res/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="./res/css/styles2.css">

                <div>

                    <h2 class="h1-text">Bienvenido a Psicologos Temuco</h2>
                    </br>
                    </br>
                    <p style="text-align:center;" class="lead">Seleccione una de nuestras Categorías. . .</p>
                    </br>
                    </br>

                    <?php
                    $themes = ThemeData::getAll();
                    if (count($themes) > 0) :
                    ?>
                    <div class="cont">
                        <div class="contenedor2">
                            <!--bootstrap card with 3 horizontal images-->
                            <?php
                            foreach ($themes as $thms) :
                            ?>


                            <div class="card">
                                <a href="./?view=index&id=<?php echo $thms->id; ?>"?>
                                    <img class="img-bg" src="./res/img/themes/<?php echo $thms->image; ?>" /></a>
                                    <div class="card-container">
                                        <h2><?php echo $thms->name; ?></h2>
                                        <p class="card-text">
                                            <?php echo $thms->description; ?>
                                        </p>
                                    </div>
                            </div>


                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php else : ?>
                        <p class="alert alert-info">No hay categorias</p>
                    <?php endif; ?>


                </div>
<br><br><br><br>