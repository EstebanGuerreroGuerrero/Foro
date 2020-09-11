<?php

if (isset($_GET["opt"]) && $_GET["opt"]=="save"){


	function verArray($save){

		if($save->post_id == $_POST["post_id"] && $save->user_id == $_SESSION["user_id"]){
			return true;
		}else {
			return false;
		}
	}

		$saves = SaveData::getId();

		$existe = array_filter($saves, "verArray");

		//print_r($existe);
		
		if($existe == NULL){

			$post = new SaveData();
	    	$post->post_id = $_POST["post_id"];
	    	$post->user_id = $_SESSION["user_id"];
	  	 	$post->save();
			Core::redir("./?view=posts&id=1");
			
		} else {

			Core::alert("Ya haz guardado esta PUBLICACIÓN");
			Core::redir("./?view=posts&id=1");
			
		}

		

	
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="delsave"){

	//echo $post=$_GET["id"];

	$posts = new SaveData();
	$posts->post_id = $_GET["id"];

	$posts->delsave();
	Core::redir("./?view=saveposts");
	
} else if(isset($_GET["opt"]) && $_GET["opt"]=="test"){
	echo "Funciona el test";
}

?>