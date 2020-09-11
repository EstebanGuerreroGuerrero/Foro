<?php
class PostData {
	public static $tablename = "post";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
		$this->image = "";
		$this->post_id = "";
		$this->user_id = "";
		$this->notify = 1;
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (title,image,content,notify,category_id,user_id,created_at) ";
		$sql .= "value (\"$this->title\",\"$this->image\",\"$this->content\",\"$this->notify\",$this->category_id,$this->user_id, NOW())";
		return Executor::doit($sql);
	}

	public function accept(){
		$sql = "update ".self::$tablename." set notify=2 where id=$this->post_id";
		Executor::doit($sql);
	}

	public function denied(){
		$sql = "update ".self::$tablename." set status=0 where id=$this->id";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	
	public function del(){

		$sql1 = "delete from files where post_id=$this->post_id";
		$sql2 = "delete from comment where post_id=$this->post_id";
		$sql3 = "delete from post_user where post_id=$this->post_id";
		$sql4 = "delete from post where id=$this->post_id";

		Executor::doit($sql1);
		Executor::doit($sql2);
		Executor::doit($sql3);
		Executor::doit($sql4);
	}

// partiendo de que ya tenemos creado un objecto PostData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",content=\"$this->content\",image=\"$this->image\",category_id=\"$this->category_id\",status=$this->status where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PostData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}
	
	public static function getAllActive(){
		$sql = "select * from ".self::$tablename." where notify=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function getAllByCat($id){
		$sql = "select * from ".self::$tablename." where category_id=$id and status=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function getByCat($id){
		$sql = "select * from ".self::$tablename." where category_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function getAllById($id){
		$sql = "select id from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PostData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}

	public static function getAllByUser($id){
		$sql = "select * from ".self::$tablename." where user_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostData());
	}


}

?>