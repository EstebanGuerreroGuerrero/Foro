<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="add"){

	$user = new CategoryData();

	//-------  CARGA UNA IMAGEN-------------------------------------------------------------------------------------------------

	$image="";

	if($_FILES['image']['name'] != null){

	$url='../res/img/categories';
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
		
			if(!file_exists('../res/img/categories')){
				mkdir('../res/img/categories',0777,true);
				if(file_exists('../res/img/categories')){
					if(move_uploaded_file($guardado, '../res/img/categories/'.$nombre)){
						Core::alert("Archivo guardado y se creo la carpeta");
					} else {
						Core::alert("No se guardo con exito, la carpeta no existe");
					}
				}
			} else {
		
				if(move_uploaded_file($guardado, '../res/img/categories/'.$nombre)){
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

	$user->image = $image;
	$user->name = $_POST["name"];
	$user->theme_id = $_POST["theme"];
	$user->description = $_POST["content"];
	$user->add();
	Core::redir("./?view=categories");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){

	$user = CategoryData::getById($_POST["category_id"]);
	$user->name = $_POST["name"];
	$user->description = $_POST["content"];
	$user->theme_id = $_POST["theme_id"];
	$user->update();
	Core::redir("./?view=categories");
}

else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){

	$category = CategoryData::getById($_GET["id"]);
	$category->del();
	Core::alert("Recuerde que debe borrar todas las Publicaciones de esta categoría antes de querer eliminarla por completo.");
	Core::redir("./index.php?view=categories");
}

?>
