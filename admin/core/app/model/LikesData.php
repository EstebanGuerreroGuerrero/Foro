<?php
class LikesData {
    public static $tablename = "likes";


    public function __construct(){
        $this->comment_id = "";
        $this->user_id = "";
        $this->fecha = "NOW()";
        $this->status = 0;
    }

    public function like(){
        $sql = "insert into ".self::$tablename." (comment,user,liked_at,status) ";
        $sql .= "value ('$this->comment_id','$this->user_id',NOW(),'$this->status'";
        return Executor::doit($sql);
    }

    public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new LikesData());

    }

    public static function getIdByUser($id){
        $sql = "select id from ".self::$tablename." where user_id=$id";
        $query = Executor::doit($sql);
        return Model::many($query[0],new LikesData());
    }
}
?>