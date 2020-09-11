<?php
if(isset($_GET["opt"]) && $_GET["opt"]=="add"){

	$user = new PostData();

	//-------  CARGA UNA IMAGEN-------------------------------------------------------------------------------------------------
	$session = $_SESSION['user_id'];
	$image="";
	
	if($_FILES['picture']['name'] != null){

	$url='./core/app/Recursos/img/'.$session;
	$img = $url . basename($_FILES['picture']['name']);
	$typeimg = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	$image=$_FILES['picture']['name'];

		//validando el tamaño del archivo
	$size = $_FILES['picture']['size'];
	if($size > 2500000){

		Core::alert("El tamaño de la imagen es mayor a 2.5 Mbytes");

	} else {
		
		if(	$typeimg == "jpg" || 
			$typeimg == "png" ||
			$typeimg == "jpeg"
		){
			$nombre=$_FILES['picture']['name'];
			$guardado=$_FILES['picture']['tmp_name'];
		
			if(!file_exists('./core/app/Recursos/img/'.$session)){
				mkdir('./core/app/Recursos/img/'.$session,0777,true);
				if(file_exists('./core/app/Recursos/img/'.$session)){
					if(move_uploaded_file($guardado, './core/app/Recursos/img/'.$session.'/'.$nombre)){
						//Core::alert("Archivo guardado y se creo la carpeta");
					} else {
						//Core::alert("No se guardo con exito, la carpeta no existe");
					}
				}
			} else {
		
				if(move_uploaded_file($guardado, './core/app/Recursos/img/'.$session.'/'.$nombre)){
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
	//----------------------------------------------------------------------------------------------------------
	$cat=$_POST["category_id"];

	$user->image = $image;
	$user->title = $_POST["title"];
	$user->content = $_POST["content"];
	$user->category_id = $_POST["category_id"];
	$user->user_id = $_SESSION["user_id"];
	$user->notify = 1;
	$user->add();
	
	Core::redir("./?view=index&id=$cat");
}

else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
	$user = PostData::getById($_POST["user_id"]);
	if($user->user_id==$_SESSION["user_id"]){

	$user->title = $_POST["title"];
	//$user->brief = $_POST["brief"];
	$user->content = $_POST["content"];

	$image = $user->image;
	$img = new Upload($_FILES["image"]);
	if($img->uploaded){
		$img->Process("uploads/");
		if($img->processed){
			$image = $img->file_dst_name;
		}
	}
	$user->image = $image;

	$user->category_id = $_POST["category_id"];
	$user->status = $user->status;//isset($_POST["status"])?1:0;
	$user->update();
	}

	Core::redir("./?view=home");
}

else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$category = PostData::getById($_GET["id"]);
	if($category->user_id==$_SESSION["user_id"]){
		$category->del();
	}
	Core::redir("./index.php?view=home");
}

else if(isset($_GET["opt"]) && $_GET["opt"]=="delsave"){

	//$posts = SaveData::delById($_GET["id"]);

	$posts = new SaveData();
	$posts->post_id = $_GET["id"];

	$posts->delsave();
	Core::redir("./?view=saveposts");
	
}

else if(isset($_GET["opt"]) && $_GET["opt"]=="delpost"){

	

	$borrar = new PostData();
	$borrar->post_id = $_GET['id'];
	$borrar->user_id = $_SESSION['user_id'];
	$borrar->del();

	Core::redir("./index.php?view=posts&id=1");
} 

else if(isset($_GET["opt"]) && $_GET["opt"]=="newfile"){

	$post_id = $_POST['post_id'];
	
	$archivos = new FilesData();
	$session = $_SESSION['user_id'];

	//-------  CARGA UNA IMAGEN-------------------------------------------------------------------------------------------------
	$image="";
	
	if($_FILES['image']['name'] != null){

	$url='./core/app/Recursos/img/'.$session.'/'.$_POST["post_id"].'/';
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
		
			if(!file_exists('./core/app/Recursos/img/'.$session.'/'.$_POST["post_id"])){
				mkdir('./core/app/Recursos/img/'.$session.'/'.$_POST["post_id"],0777,true);
				if(file_exists('./core/app/Recursos/img/'.$session.'/'.$_POST["post_id"])){
					if(move_uploaded_file($guardado, './core/app/Recursos/img/'.$session.'/'.$_POST["post_id"].'/'.$nombre)){
						//Core::alert("Archivo guardado y se creo la carpeta");
					} else {
						//Core::alert("No se guardo con exito, la carpeta no existe");
					}
				}
			} else {
		
				if(move_uploaded_file($guardado, './core/app/Recursos/img/'.$session.'/'.$_POST["post_id"].'/'.$nombre)){
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
	//----------------------------------------------------------------------------------------------------------

	//------  CARGA UN ARCHIVO--------------------------------------------------------------------------------------------------

	$file="";

	if($_FILES['archivo']['name'] != null){

	$url="./core/app/Recursos/files/".$session.'/'.$_POST["post_id"].'/';
	$fil = $url . basename($_FILES['archivo']['name']);
	$typefile = strtolower(pathinfo($fil, PATHINFO_EXTENSION));

	$file=$_FILES['archivo']['name'];
		//validando el tamaño del archivo
	$size = $_FILES['archivo']['size'];
	if($size > 2500000){

		Core::alert("El archivo es mayor a 2.5 Mbytes");

	} else {
		
		if($typefile == "pdf"){

			$nombre=$_FILES['archivo']['name'];
			$guardado=$_FILES['archivo']['tmp_name'];
		
			if(!file_exists('./core/app/Recursos/files/'.$session.'/'.$_POST["post_id"])){
				mkdir('./core/app/Recursos/files/'.$session.'/'.$_POST["post_id"],0777,true);
				if(file_exists('./core/app/Recursos/files/'.$session.'/'.$_POST["post_id"])){
					if(move_uploaded_file($guardado, './core/app/Recursos/files/'.$session.'/'.$_POST["post_id"].'/'.$nombre)){
						//Core::alert("Archivo guardado se creo la carpeta");
					} else {
						//Core::alert("No se guardo con exito la carpeta no existe");
					}
				}
			} else {
		
				if(move_uploaded_file($guardado, './core/app/Recursos/files/'.$session.'/'.$_POST["post_id"].'/'.$nombre)){
					//Core::alert("Archivo guardado exitosamente");
				} else {
					//Core::alert("No se guardo con exito");
				}
			}
			
		} else {

			Core::alert("EL ARCHIVO NO SE GUARDO CORRECTAMENTE: .pdf ");

		}

	}
}


// CARGAR UN ARCHIVO RAR ---------------------------------------------------------------------
// $rar="";

// 	if($_FILES['rar']['name'] != null){

// 	$url="./core/app/Recursos/files/".$session.'/'.$_POST["post_id"].'/';
// 	$fil = $url . basename($_FILES['rar']['name']);
// 	$typefile = strtolower(pathinfo($fil, PATHINFO_EXTENSION));

// 	$rar=$_FILES['rar']['name'];
// 		//validando el tamaño del archivo
// 	$size = $_FILES['rar']['size'];
// 	if($size > 2500000){

// 		Core::alert("El archivo es mayor a 2.5 Mbytes");

// 	} else {
		
// 		if($typefile == "rar"){

// 			$nombre=$_FILES['rar']['name'];
// 			$guardado=$_FILES['rar']['tmp_name'];
		
// 			if(!file_exists('./core/app/Recursos/files/'.$session.'/'.$_POST["post_id"])){
// 				mkdir('./core/app/Recursos/files/'.$session.'/'.$_POST["post_id"],0777,true);
// 				if(file_exists('./core/app/Recursos/files/'.$session.'/'.$_POST["post_id"])){
// 					if(move_uploaded_file($guardado, './core/app/Recursos/files/'.$session.'/'.$_POST["post_id"].'/'.$nombre)){
// 						Core::alert("Archivo guardado se creo la carpeta");
// 					} else {
// 						Core::alert("No se guardo con exito la carpeta no existe");
// 					}
// 				}
// 			} else {
		
// 				if(move_uploaded_file($guardado, './core/app/Recursos/files/'.$session.'/'.$_POST["post_id"].'/'.$nombre)){
// 					Core::alert("Archivo guardado exitosamente");
// 				} else {
// 					Core::alert("No se guardo con exito");
// 				}
// 			}
			
// 		} else {

// 			Core::alert("EL ARCHIVO NO SE GUARDO CORRECTAMENTE: .pdf ");

// 		}

// 	}
// }

	//----------------------------------------------------------------------------------------------------------
	//$archivos->rar = $rar;
	$archivos->user_id = $_SESSION['user_id'];
	$archivos->title = $_POST["title"];
	$archivos->post_id = $post_id;
	$archivos->file = $file;
	$archivos->image = $image;
	$archivos->add();

	//Core::redir("./?view=posts&id=".$_POST["category_id"]);
	Core::redir("./?view=post&id=$post_id");

}




//COMENTARIOS
if(isset($_GET["opt"]) && $_GET["opt"]=="delcom"){
	
	$comment = new CommentData();
	$comment->comment_id = $_GET['id'];
	$comment->del();

		
		Core::redir("./?view=posts&id=1");
}

?>