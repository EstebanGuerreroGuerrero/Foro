<?php
class NotifyData {
    public static $tablename = "notify";

    public function __construct(){
		$this->post_id = "";
        $this->user_id = "";
        $this->status = 1;
	}
    
    public static function getStatus(){
      $sql = "select * from ".self::$tablename." where status = 1";
      $query = Executor::doit($sql);
	  	return Model::many($query[0],new NotifyData());
    }
    
    public static function userCreated(){
        $sql = "insert into ".self::$tablename." (status, user_id) ";
		    $sql .= "value (\"$this->status\",$this->user_id)";
		  return Executor::doit($sql);
    }

    public static function postCreated($post){
        $sql = "insert into ".self::$tablename." (status, post_id) ";
		    $sql .= "value (\"$this->status\",$post)";
		  return Executor::doit($sql);
    }

}

?>