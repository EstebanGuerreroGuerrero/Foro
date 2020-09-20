<?php
class UserData {
	public static $tablename = "user";

	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->password = "";
		$this->cpassword = "";
		$this->is_active = "0";
		$this->created_at = "NOW()";
		$this->post_id = "";
		$this->user_id = "";
		$this->status = "";
		$this->notify = 1;
		$this->email = "";
		$this->type = "";
		$this->image = "";
		$this->formacion = "";
		$this->description = "";
		$this->especializacion = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,lastname,email,notify,username,password,formacion,especializacion,image,description,status,type,kind,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->notify\",\"$this->username\",\"$this->password\",\"$this->formacion\",\"$this->especializacion\",\"$this->image\",\"$this->description\",1,3,3,$this->created_at)";
		Executor::doit($sql);
	}

	public function addAdmin(){
		$sql = "insert into ".self::$tablename." (name,lastname,email,notify,username,password,status,type,kind,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->notify\",\"$this->username\",\"$this->password\",1,2,1,$this->created_at)";
		Executor::doit($sql);
	}

	public function register(){
		$sql = "insert into ".self::$tablename." (name,lastname,email,username,password,formacion,especializacion,image,description,status,notify,type,kind,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->username\",\"$this->password\",\"$this->formacion\",\"$this->especializacion\",\"$this->image\",\"$this->description\",1,1,3,3,$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function accept(){
		$sql = "update ".self::$tablename." set notify=2 where id=$this->user_id";
		Executor::doit($sql);
	}

	public function editUser(){
		$sql = "update ".self::$tablename." set name=$this->name,
											lastname=$this->lastname,
											username=$this->username,
											email=$this->email,
											status=$this->status
				where id=$this->user_id";
		Executor::doit($sql);
	}

	public function delpost(){
		
		$sql1 = "delete from files where post_id=$this->post_id";
		$sql2 = "delete from comment where post_id=$this->post_id";
		$sql3 = "delete from post_user where post_id=$this->post_id";
		$sql4 = "delete from post where id=$this->post_id";
		
		Executor::doit($sql1);
		Executor::doit($sql2);
		Executor::doit($sql3);
		Executor::doit($sql4);
		
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",email=\"$this->email\",username=\"$this->username\",password=\"$this->password\",status=$this->status,kind=$this->kind where id=$this->id";
		Executor::doit($sql);
	}

	public function update_profile(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",email=\"$this->email\",image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}
	
	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwdByEmail(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where email=$this->email";
		Executor::doit($sql);
	}

	public function giveAdm(){
		$sql = "update ".self::$tablename." set type=2 where id=$this->id";
		$sql2 = "update ".self::$tablename." set kind=1 where id=$this->id";
		Executor::doit($sql);
		Executor::doit($sql2);
	}

	public function leaveAdm(){
		$sql = "update ".self::$tablename." set type=3 where id=$this->id";
		$sql2 = "update ".self::$tablename." set kind=3 where id=$this->id";
		Executor::doit($sql);
		Executor::doit($sql2);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getKind($id){
		$sql = "select kind from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getByEmail($email){
		$sql = "select * from ".self::$tablename." where email=\"$email\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getAllUsers(){
		$sql = "select * from ".self::$tablename." where type=3 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getAllAdmins(){
		$sql = "select * from ".self::$tablename." where type=1 or type=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getAllActive(){
		$sql = "select * from ".self::$tablename." where notify=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getAllByUser($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

}

?>