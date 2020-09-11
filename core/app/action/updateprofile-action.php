<?php

if (isset($_GET["opt"]) && $_GET["opt"] == "updateprof"){


	if(count($_POST)>0){
		$user = Core::$user;
		$image = $user->image;

		$imx = new Upload($_FILES["image"]);
		if($imx->uploaded){
			$imx->Process("./uploads/");
			if($imx->processed){
				$image = $imx->file_dst_name;
			}
		}

		$user->name = $_POST["name"];
		$user->image = $image;
		$user->lastname = $_POST["lastname"];
		$user->email = $_POST["email"];
		$user->update_profile();


	print "<script>window.location='index.php?view=profile';</script>";


	}
}

if (isset($_GET["opt"]) && $_GET["opt"] == "updatepass") {

	if($_POST["password"] == $_POST["c-password"]){

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


?>