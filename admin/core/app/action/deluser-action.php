<?php

$admin = UserData::getById($_SESSION["user_id"]);
$user = UserData::getById($_GET["id"]);

$posts = PostData::getAllByUser($user->id);


if($admin->kind == 1){

	$username = $user->username;
	$lastname = $user->lastname;

	if($user->id != $admin->id){

		foreach($posts as $post){
			$public = $post->id;
			$user->post_id = $public;
			$user->delpost();
		}
		
		if ($user->image != null) {
			$filename = '../core/app/Recursos/img/' . $username . $lastname . '/' . $user->image;

			if (file_exists($filename)) {
				$success = unlink($filename);

				if (!$success) {
					throw new Exception("Cannot delete $filename");
				}
			}
		}

		$user->del();
		Core::alert("Eliminado exitosamente!");
		Core::redir("./?view=admins");

	}else{

	Core::alert("No te puedes eliminar a ti mismo");
	Core::redir("./?view=users");

	}

}else{
	Core::alert("Error!");
}
//Core::redir("./logout.php");


?>