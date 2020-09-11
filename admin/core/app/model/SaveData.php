<?php
class SaveData {
    public static $tablename = "post_user";


    public function __construct(){
        $this->post_id = "";
        $this->user_id = "";
        $this->fecha = "NOW()";
    }

    public function save(){
        $sql = "insert into ".self::$tablename." (user_id,post_id,fecha) ";
        $sql .= "value ($this->user_id,$this->post_id, NOW())";
        return Executor::doit($sql);
    }

    public function delsave(){
      $sql = "delete from ".self::$tablename." where id=$this->post_id";
      Executor::doit($sql);
	  }
    
	  public static function getId(){
      $sql = "select * from post_user";
      $query = Executor::doit($sql);
      return Model::many($query[0],new SaveData());
    }
    
    public static function getAllByUser($id){
      $sql = "select * from ".self::$tablename." where user_id=$id";
      $query = Executor::doit($sql);
      return Model::many($query[0],new SaveData());
    }

    public static function getSavePost($id){
        $sql = "SELECT * 
                FROM post
                INNER JOIN post_user
                ON post.id = post_user.post_id
                WHERE post_user.user_id =$id;";
        $query = Executor::doit($sql);
        return Model::many($query[0],new SaveData());
    }

    public static function delById(){
		$sql = "DELETE 
                FROM savepost 
                WHERE user_id = $this->user_id
                AND post_id = $this->post_id";
		Executor::doit($sql);
    }

}

?>