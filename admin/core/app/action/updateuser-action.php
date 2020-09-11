<?php
if(isset($_GET["opt"]) && $_GET["opt"]=="giveAdm"){
    
    $ux = new UserData();
    $ux->id = $_GET['id'];
    $ux->giveAdm();

    Core::redir("./?view=admins");
} 

else if (isset($_GET["opt"]) && $_GET["opt"]=="leaveAdm"){

    $ux = new UserData();
    $ux->id = $_GET['id'];
    $ux->leaveAdm();

    Core::redir("./?view=users");
}

else if (isset($_GET["opt"]) && $_GET["opt"]=="editusers"){

    $ux = new UserData();
    $ux->user_id = $_POST['id'];
    $ux->name = $_POST['name'];
    $ux->lastname = $_POST['lastname'];
    $ux->username = $_POST['username'];
    $ux->email = $_POST['email'];
    $ux->status = $_POST['status'];
    $ux->editUser();

    $ux->password = sha1(md5($_POST["password"]));
    $ux->update_passwd();

    

     if($_POST['kind'] == 2){
         $ux->kind == 1;
     } else {
        $ux->kind == 3;
     }


    

    Core::redir("./?view=admins");
}
