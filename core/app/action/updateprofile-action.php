<?php

if (isset($_GET["opt"]) && $_GET["opt"] == "updateprof") {


	$name = $_POST["name"];
	$lastname = $_POST["lastname"];

	if (count($_POST) > 0) {
		$user = Core::$user;

		if ($_POST["name"] != "") {
			$user->name = $_POST["name"];
		}

		if ($_POST["lastname"] != "") {
			$user->lastname = $_POST["lastname"];
		}

		if ($_POST["email"] != "") {
			$user->email = $_POST["email"];
		}

		if ($_POST["username"] != "") {
			$user->username = $_POST["username"];
		}

		//-------  CARGA UNA IMAGEN-------------------------------------------------------------------------------------------------
		$image = "";
		$username = $_POST["name"];
		$lastname = $_POST["lastname"];

		if ($_FILES['picture']['name'] != "") {

			//Borra imagen existente
			$ux = UserData::getById($_POST['id']);
			if ($ux->image != null) {
				$filename = './core/app/Recursos/img/' . $username . $lastname . '/' . $ux->image;

				if (file_exists($filename)) {
					$success = unlink($filename);

					if (!$success) {
						throw new Exception("Cannot delete $filename");
					}
				}
			}

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

					if (!file_exists('./core/app/Recursos/img/' . $username . $lastname)) {
						mkdir('./core/app/Recursos/img/' . $username . $lastname, 0777, true);
						if (file_exists('./core/app/Recursos/img/' . $username . $lastname)) {
							if (move_uploaded_file($guardado, './core/app/Recursos/img/' . $username . $lastname . '/' . $nombre)) {
								//Core::alert("Archivo guardado y se creo la carpeta");
							} else {
								//Core::alert("No se guardo con exito, la carpeta no existe");
							}
						}
					} else {

						if (move_uploaded_file($guardado, './core/app/Recursos/img/' . $username  . $lastname . '/' . $nombre)) {
							//Core::alert("Archivo guardado exitosamente");
						} else {
							//Core::alert("No se guardo con exito");
						}
					}
				} else {

					Core::alert("LA IMAGEN NO SE GUARDO CORRECTAMENTE: Solo se admiten archivos: .jpg - .png y .jpeg ");
				}
			}
			$user->image = $image;
		}
		//----------------------------------------------------------------------------------------------------------

		
		$user->update_profile();


		print "<script>window.location='index.php?view=profile';</script>";
	}
}

if (isset($_GET["opt"]) && $_GET["opt"] == "updatepass") {

	if ($_POST["password"] == $_POST["c-password"]) {

		$user = Core::$user;
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();

		Core::alert('Se ha actualizado el password');
		print "<script>window.location='index.php?view=profile';</script>";
	} else {

		Core::alert("Las contraseñas deben coincidir");
		print "<script>window.location='index.php?view=profile';</script>";
	}
}

if (isset($_GET["opt"]) && $_GET["opt"] == "updatedatas") {


	if (count($_POST) > 0) {

		$user = UserData::getById($_POST['id']);
		$user->id = $_POST["id"];

		if ($_POST["description"] != "") {
			$user->description = $_POST["description"];
		}

		if ($_POST["fono"] != "") {
			$user->fono = $_POST["fono"];
		}

		if ($_POST["formacion"] != "") {
			$user->formacion = $_POST["formacion"];
		}

		if ($_POST["especialidad"] != "") {
			$user->especializacion = $_POST["especialidad"];
		}

		$user->update_datas();

		Core::redir("./?view=viewprofile");
	}
}
