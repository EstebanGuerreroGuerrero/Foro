<?php
if(isset($_GET["opt"]) && $_GET["opt"]=="giveAdm"){
    
    $ux = new UserData();
    $ux->id = $_GET['id'];
    $ux->giveAdm();

    Core::redir("./?view=admins");
} 

else if (isset($_GET["opt"]) && $_GET["opt"]=="leaveAdm"){

    $ux = new UserData();
    $ux->id = $_POST["user_id"];
    $ux->leaveAdm();

    Core::redir("./?view=users");
}

else if (isset($_GET["opt"]) && $_GET["opt"]=="editusers"){

    $ux = UserData::getById($_POST["user_id"]);
    $ux->user_id = $_POST['user_id'];

    if ($_POST["name"] != "") {
        $ux->name = $_POST["name"];
    }

    if ($_POST["lastname"] != "") {
        $ux->lastname = $_POST["lastname"];
    }

    if ($_POST["email"] != "") {
        $ux->email = $_POST["email"];
    }

    if ($_POST["username"] != "") {
        $ux->username = $_POST["username"];
    }

    //-------  CARGA UNA IMAGEN-------------------------------------------------------------------------------------------------
			$image = "";
			$username = $_POST["name"];
            $lastname = $_POST["lastname"];
            
			if ($_FILES['picture']['name'] != null) {

                        //Borra imagen existente
                    $user = UserData::getById($_POST['user_id']);
                    if ($user->image != null) {
                        $filename = '../core/app/Recursos/img/' . $username . $lastname . '/' . $user->image;

                        if (file_exists($filename)) {
                            $success = unlink($filename);

                            if (!$success) {
                                throw new Exception("Cannot delete $filename");
                            }
                        }
                    }

				$url = '../core/app/Recursos/img/' . $username . $lastname;
				$img = $url . basename($_FILES['picture']['name']);
				$typeimg = strtolower(pathinfo($img, PATHINFO_EXTENSION));
				$image = $_FILES['picture']['name'];

				//validando el tamaño del archivo
				$size = $_FILES['picture']['size'];
				if ($size > 2500000) {

					Core::alert("El tamaño de la imagen es mayor a 2.5 Mbytes");
				} else {

					if (
						$typeimg == "jpg" ||
						$typeimg == "png" ||
						$typeimg == "jpeg"
					) {
						$nombre = $_FILES['picture']['name'];
						$guardado = $_FILES['picture']['tmp_name'];

						if (!file_exists('../core/app/Recursos/img/' . $username . $lastname)) {
							mkdir('../core/app/Recursos/img/' . $username . $lastname, 0777, true);
							if (file_exists('../core/app/Recursos/img/' . $username . $lastname)) {
								if (move_uploaded_file($guardado, '../core/app/Recursos/img/' . $username . $lastname . '/' . $nombre)) {
									//Core::alert("Archivo guardado y se creo la carpeta");
								} else {
									//Core::alert("No se guardo con exito, la carpeta no existe");
								}
							}
						} else {

							if (move_uploaded_file($guardado, '../core/app/Recursos/img/' . $username . $lastname . '/' . $nombre)) {
								//Core::alert("Archivo guardado exitosamente");
							} else {
								//Core::alert("No se guardo con exito");
							}
						}
					} else {

						Core::alert("LA IMAGEN NO SE GUARDO CORRECTAMENTE: Solo se admiten archivos: .jpg - .png y .jpeg ");
					}
                }

            $ux->image = $image;
            }
        //------- END CARGA UNA IMAGEN----------------------------------------------------------------------------------------------
		
									// $user->clo_id = isset($_POST["clo_id"])?$_POST["clo_id"]:"NULL";
									// $user->razonsocial_id = isset($_POST["razonsocial_id"])?$_POST["razonsocial_id"]:"NULL";
									// $user->gerencia_id = isset($_POST["gerencia_id"])?$_POST["gerencia_id"]:"NULL";
									// $user->subdireccion_id = isset($_POST["subdireccion_id"])?$_POST["subdireccion_id"]:"NULL";
									//$user->is_admin=$is_admin;
									
			
    $ux->editUser();

    Core::redir("./?view=users");
}

else if (isset($_GET["opt"]) && $_GET["opt"]=="editdat"){

    $ux = UserData::getById($_POST["user_id"]);
    $ux->user_id = $_POST['user_id'];

    if ($_POST["description"] != "") {
        $ux->description = $_POST["description"];
    }

    if ($_POST["fono"] != "") {
        $ux->fono = $_POST["fono"];
    }

    if ($_POST["formacion"] != "") {
        $ux->formacion = $_POST["formacion"];
    }

    if ($_POST["especializacion"] != "") {
        $ux->especializacion = $_POST["especializacion"];
    }
    
    $check_value = isset($_POST['status']) ? 1 : 0;
    $ux->status = $check_value;
    
    $ux->editdat();

    Core::redir("./?view=users");

}

else if (isset($_GET["opt"]) && $_GET["opt"]=="editpass"){

    if ($_POST["password"] == $_POST["c-password"]) {

        $ux = UserData::getById($_POST["user_id"]);
        $ux->user_id = $_POST['user_id'];

        $ux->password = sha1(md5($_POST["password"]));
        $ux->update_passwd();
    }

    Core::redir("./?view=users");

}