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
?>