<?php
class FilesData {
	public static $tablename = "files";


	public function __construct(){
        $this->user_id = "";
        $this->post_id = "";
        $this->file = "";
        $this->image = "";
		$this->title = "";
		$this->rar = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (file, image, title, user_id, post_id) ";
		$sql .= "value (\"$this->file\",\"$this->image\",\"$this->title\",$this->user_id,$this->post_id) ";
		return Executor::doit($sql);
    }

    public static function getById($id){
		$sql = "select * from ".self::$tablename." where post_id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FilesData());
	}

	public static function getAllById($id){
		$sql = "select * from ".self::$tablename." where post_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FilesData());
	}

}

?>