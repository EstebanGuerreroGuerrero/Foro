<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="add"){

	$theme = new ThemeData();

	//-------  CARGA UNA IMAGEN-------------------------------------------------------------------------------------------------

	$image="";

	if($_FILES['image']['name'] != null){

	$url='../res/img/themes';
	$img = $url . basename($_FILES['image']['name']);
	$typeimg = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	$image=$_FILES['image']['name'];

		//validando el tamaño del archivo
	$size = $_FILES['image']['size'];
	if($size > 2500000){

		Core::alert("El tamaño de la imagen es mayor a 2.5 Mbytes");

	} else {
		
		if(	$typeimg == "jpg" || 
			$typeimg == "png" ||
			$typeimg == "jpeg"
		){
			$nombre=$_FILES['image']['name'];
			$guardado=$_FILES['image']['tmp_name'];
		
			if(!file_exists('../res/img/themes')){
				mkdir('../res/img/themes',0777,true);
				if(file_exists('../res/img/themes')){
					if(move_uploaded_file($guardado, '../res/img/themes/'.$nombre)){
						Core::alert("Archivo guardado y se creo la carpeta");
					} else {
						Core::alert("No se guardo con exito, la carpeta no existe");
					}
				}
			} else {
		
				if(move_uploaded_file($guardado, '../res/img/themes/'.$nombre)){
					Core::alert("Archivo guardado exitosamente");
				} else {
					Core::alert("No se guardo con exito");
				}
			}
			
		} else {

			Core::alert("LA IMAGEN NO SE GUARDO CORRECTAMENTE: Solo se admiten archivos: .jpg - .png y .jpeg ");

		}

		}
	}
	//------- END carga imagen -------------------------------------------------------------------------------------------------


	$theme->image = $image;
	$theme->name = $_POST["name"];
	$theme->description = $_POST["content"];
	$theme->add();
	Core::redir("./?view=themes");
}

else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){

	$theme = ThemeData::getById($_POST["user_id"]);
	$theme->name = $_POST["name"];
	$theme->update();
	Core::redir("./?view=themes");
}

else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){

	$theme = ThemeData::getById($_GET["id"]);
	$theme->del();
	Core::alert("Recuerde que debe borrar las Categorías de este Tema antes de querer eliminarlo por completo.");
	Core::redir("./index.php?view=themes");
}

?>