<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="addAdmin"){
	
		$user = new UserData();
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->username = $_POST["username"];
		$user->email = $_POST["email"];
		$user->notify = 1;
		$user->password = sha1(md5($_POST["password"]));
		$user->fono = $_POST["fono"];
		$user->username = $_POST["username"];
		$user->description = $_POST["description"];
		$user->formacion = $_POST["formacion"];
		$user->especializacion = $_POST["especializacion"];
		
									// $user->clo_id = isset($_POST["clo_id"])?$_POST["clo_id"]:"NULL";
									// $user->razonsocial_id = isset($_POST["razonsocial_id"])?$_POST["razonsocial_id"]:"NULL";
									// $user->gerencia_id = isset($_POST["gerencia_id"])?$_POST["gerencia_id"]:"NULL";
									// $user->subdireccion_id = isset($_POST["subdireccion_id"])?$_POST["subdireccion_id"]:"NULL";
									//$user->is_admin=$is_admin;
									
			//-------  CARGA UNA IMAGEN-------------------------------------------------------------------------------------------------
			$image = "";
			$username = $_POST["name"];
			$lastname = $_POST["lastname"];
			if ($_FILES['picture']['name'] != null) {

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
			}					

		$user->image = $image;
		$user->password = sha1(md5($_POST["password"]));
		$user->addAdmin();
		Core::redir("./?view=admins");
	
	//print "<script>window.location='index.php?view=users';</script>";
	
	
	}
  


else if (isset($_GET["opt"]) && $_GET["opt"]=="addUser"){

	$user = new UserData();
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->username = $_POST["username"];
		$user->email = $_POST["email"];
		$user->notify = 1;
		
		$user->password = sha1(md5($_POST["password"]));
		$user->add();
		Core::redir("./?view=users");

}
