<?php
/*
//CONEXION-------------------------------

 $db_host = "localhost"; 
 $db_nombre = "bd_prealfaforo";
 $db_usuario = "root";
 $db_contra = "";

$conexion = mysqli_connect( $db_host, $db_usuario, $db_contra, $db_nombre );
mysqli_set_charset($conexion, "utf8");
//CIERRE CONEXION-----------------------

$memberId = $_SESSION["user_id"];
$commentId = $_POST['comment_id'];
$statusBD = 0;
if($_POST['statusView'] == 1)
{
$statusBD = $_POST['statusView'];
}


$sql = "SELECT * FROM likes WHERE comment=" . $commentId . " and user=" . $memberId;
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (! empty($row)) 
{
    $query = "UPDATE likes SET status = " . $statusBD . " WHERE  comment=" . $commentId . " and user=" . $memberId;
} else
{
    $query = "INSERT INTO likes(user,comment,status) VALUES ('" . $memberId . "','" . $commentId . "','" . $statusBD . "')";
}
mysqli_query($conexion, $query);

mysqli_close($conexion);
*/
?>