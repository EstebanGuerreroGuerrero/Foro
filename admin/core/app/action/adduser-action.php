<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="addAdmin"){
	
		$user = new UserData();
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->username = $_POST["username"];
		$user->email = $_POST["email"];
		$user->notify = 1;
		
									// $user->clo_id = isset($_POST["clo_id"])?$_POST["clo_id"]:"NULL";
									// $user->razonsocial_id = isset($_POST["razonsocial_id"])?$_POST["razonsocial_id"]:"NULL";
									// $user->gerencia_id = isset($_POST["gerencia_id"])?$_POST["gerencia_id"]:"NULL";
									// $user->subdireccion_id = isset($_POST["subdireccion_id"])?$_POST["subdireccion_id"]:"NULL";
									//$user->is_admin=$is_admin;
									
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
?>

