<?php

if (isset($_POST)) {

	if ($_POST["email"] != "" && $_POST["password"] != "") {
		$ux = UserData::getByEmail($_POST["email"]);

		if ($ux == null) {
			$u = new UserData();
			$u->name = $_POST["name"];
			$u->lastname = $_POST["lastname"];
			$u->email = $_POST["email"];
			$u->username = $_POST["username"];
			$u->password = sha1(md5($_POST["password"]));
			$u->notify = 1;
			$u->description = $_POST["description"];
			$u->formacion = $_POST["formacion"];
			$u->especializacion = $_POST["especializacion"];

					//-------  CARGA UNA IMAGEN-------------------------------------------------------------------------------------------------
					$image = "";
					$username = $_POST["name"];
					$lastname = $_POST["lastname"];
					if ($_FILES['picture']['name'] != null) {

						$url = './core/app/Recursos/img/' . $username . $lastname;
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

								if (!file_exists('./core/app/Recursos/img/'. $username . $lastname)) {
									mkdir('./core/app/Recursos/img/'. $username . $lastname, 0777, true);
									if (file_exists('./core/app/Recursos/img/'. $username . $lastname)) {
										if (move_uploaded_file($guardado, './core/app/Recursos/img/'. $username . $lastname . '/' . $nombre)) {
											//Core::alert("Archivo guardado y se creo la carpeta");
										} else {
											//Core::alert("No se guardo con exito, la carpeta no existe");
										}
									}
								} else {

									if (move_uploaded_file($guardado, './core/app/Recursos/img/'. $username  . $lastname . '/' . $nombre)) {
										//Core::alert("Archivo guardado exitosamente");
									} else {
										//Core::alert("No se guardo con exito");
									}
								}
							} else {

								Core::alert("LA IMAGEN NO SE GUARDO CORRECTAMENTE: Solo se admiten archivos: .jpg - .png y .jpeg ");
							}
						}
					}

			$u->image = $image;
			$u->register();
			Core::alert("Correcto, ahora puedes iniciar sesion!");
			Core::redir("./?view=login");
		} else {
			Core::alert("Error el email ya existe!");
			Core::redir("./?view=register");
		}
	} else {
		Core::redir("./");
	}
}
