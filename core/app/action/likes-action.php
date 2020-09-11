<?php

// //CONEXION-------------------------------

//   $db_host = "localhost"; 
//   $db_usuario = "root";
//   $db_contra = "";
//   $db_nombre = "bd_prealfaforo";

//   $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre) or die ("<strong>No se ha podido establecer la conexión con el SERVIDOR</strong>");;
//   mysqli_set_charset($conexion, "utf8");
//   $bd = mysqli_select_db($conexion,$db_nombre) or die ("<strong>No se ha podido establecer la BASE DE DATOS</strong>");
// //CIERRE CONEXION-----------------------

        $comment = $_POST['id'];
        $usuario = $_POST['user'];
        $status = $_POST['status'];
    
        //$query = new LikesData();
       
/*

        $comprobar = mysqli_query("SELECT * FROM likes WHERE comment = '".$comment."' AND user = ".$usuario."");
        $count = mysqli_num_rows($comprobar);
        
        if ($count == 0) {

            $insert = mysqli_query("INSERT INTO likes (comment,user,liked_at) VALUES ('$comment','$usuario',NOW())");
            $update = mysqli_query("UPDATE comment SET likes = likes+1 WHERE id = '".$comment."'");

        } else {

            $delete = mysqli_query("DELETE FROM likes WHERE comment = ".$comment." AND user = ".$usuario."");
            $update = mysqli_query("UPDATE comment SET likes = likes-1 WHERE id = '".$comment."'");

        }
        
        $contar = mysql_query("SELECT likes FROM comment WHERE id = ".$comment."");
        $cont = mysql_fetch_array($contar);
        $likes = $cont['likes'];

        if($count >= 1) {

            $megusta = "Me Gusta";
            $likes = $likes++;

        } else {

            $megusta = "No Me Gusta";
            $likes = $likes--;
        }





 PEGAR EN POST-VIEW LINEA 67
  <td>
      <div class="btn btn-default btn-xs like" >
      <input type="hidden" id="mg1" name="comment_id" value="<?php echo $com->id;?>"> 
      <input type="hidden" id="mg2" name="user_id" value="<?php echo $_SESSION["user_id"];?>">
      <input type="hidden" id="mg3" name="statusView" value=1>
      <i class="fa fa-thumbs-o-up"></i> Me Gusta </div><span id="likes_<?php echo $com->id; ?>"> (<?php echo $com->likes; ?>)</span>
  </td>



        */
        $datos = array('likes' =>$usuario, 'text' =>"MG");
        print_r($datos);
        echo json_encode($datos);
       

?>