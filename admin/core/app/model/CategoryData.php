<?php
class CategoryData {
	public static $tablename = "category";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
		$this->theme_id = "";
		$this->description = "";
		$this->theme_id = "";
		$this->image = "";
	}

	public function add(){
		$sql = "insert into category (name, description, theme_id, image) ";
		$sql .= "value (\"$this->name\",\"$this->description\", \"$this->theme_id\", \"$this->image\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\", description=\"$this->description\", theme_id=\"$this->theme_id\"   where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoryData());
	}

	public static function getByTheme($theme){
		$sql = "select * from ".self::$tablename." where theme_id=$theme";
		$query = Executor::doit($sql);
		return Model::Many($query[0],new CategoryData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}


}

?>