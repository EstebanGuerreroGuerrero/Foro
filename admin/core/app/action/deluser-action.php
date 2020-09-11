<?php

$admin = UserData::getById($_SESSION["user_id"]);
$user = UserData::getById($_GET["id"]);

$posts = PostData::getAllByUser($user->id);


if($admin->kind == 1){
	if($user->id != $admin->id){

		foreach($posts as $post){
			$public = $post->id;
			$user->post_id = $public;
			$user->delpost();
		}
		
		$user->del();
		Core::alert("Eliminado exitosamente!");
		Core::redir("./?view=users");

	}else{

	Core::alert("No te puedes eliminar a ti mismo");
	Core::redir("./?view=users");

	}

}else{
	Core::alert("Error!");
}
//Core::redir("./logout.php");


?>