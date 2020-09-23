<?php
$session = UserData::getById($_SESSION["user_id"]);
// si el usuario no esta logeado
if (!isset($_GET["id"])) {
    Core::redir("./");
}
$user = UserData::getById($_GET["id"]);
// si el id  del usuario no existe.
if ($user == null) {
    Core::redir("./");
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Hola, <?php echo $session->name; ?> <small>Estas son las publicaciones creadas por <?php echo $user->name; ?></small></h2>

        </div>
    </div>
</div>
<section class="container">
    <div class="row">
        <div class="col-md-12">



            <br>
            <br>
            <?php

            $posts = PostData::getAllByUser($user->id);
            if (count($posts) > 0) {
                // si hay posts
            ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <th>Titulo</th>
                                <th>Seccion</th>
                                <th>Creacion</th>
                                <th></th>
                            </thead>
                            <?php
                            foreach ($posts as $user) {
                            ?>
                                <tr>
                                    <td><?php echo $user->title; ?></td>
                                    <td><?php echo CategoryData::getById($user->category_id)->name; ?></td>

                                    <td><?php echo $user->created_at; ?></td>
                                    <td style="width:130px;">

                                        <a href="./?view=post&id=<?php echo $user->id; ?>" class="btn btn-success">Abrir</a></td>
                                </tr>
                            <?php

                            }

                            ?>
                        </table>
                    </div>
                </div>
            <?php


            } else {
                echo "<p class='alert alert-danger'>No hay Articulos</p>";
            }


            ?>


        </div>
    </div>

</section>