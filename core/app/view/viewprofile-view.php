<?php
    $user = UserData::getById($_SESSION["user_id"]);
?>

<div class="container">
    <h1>Profile</h1>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel-body2">
                <div class="row">
                    <div class="container3">

                        <div class="item-container">
                            <div>
                                <div>
                                <img src='./core/app/Recursos/img/<?php echo $user->name; ?><?php echo $user->lastname; ?>/<?php echo $user->image; ?>' class="img-profile">
                                </div>
                            </div>

                            <div class="h2-texto">
                                <h2><?php echo $user->username; ?></a></h2>
                            </div>
                            <div class="datos-container">
                                <p>Nombre: <b><?php echo $user->name; ?> <?php echo $user->lastname; ?></b></p>
                                <p>Email: <b><?php echo $user->email; ?></b></p>
                                <p>Profesión: <b>Psicólogo</b></p>
                                <p>Fono: <b>82163569</b></p>
                            </div>
                        </div>

                        <div class="item-container">
                            <div style="margin-left:550px; margin-top:20px;"><button class="btn btn-warning">Editar</button></div>
                            <div style="margin-top:10px; font-style: italic; font-size: x-large;">¿Quien soy?</div>
                            <hr>
                            <div>
                                <p><?php echo $user->description; ?></p>
                            </div>

                            <div style="margin-top:60px; font-style: italic; font-size: x-large;">Usuario</div>
                            <hr>
                            <div>
                                </br>
                                <ul style="font-size: large;">
                                    <li class="glyphicon glyphicon-list-alt"> Especialidad: <b><?php echo $user->especializacion; ?></b></li></br></br>
                                    <li class="glyphicon glyphicon-user"> Tipo de usuario: </li></br></br>
                                    <li class="glyphicon glyphicon-send"> Formación: <b><?php echo $user->formacion; ?></b></li></br></br>
                                    <li class="glyphicon glyphicon-briefcase"> Enfermedades tratadas: </li></br>
                                    <div style="margin-left:450px;"><button class="btn btn-primary" >Publicados por <b><?php echo $user->username; ?></b></button></div>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>