<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $id;
	public $name;
	public $role_id;
	public $errorMessage='帐号或者密码错误!';
//	public function __construct($username,$password)
//	{
//		$this->username=$username;
//		$this->password=$password;
//	}

	public function authenticate()
	{
/*
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		session_start();
		$user = $_REQUEST["user"];
		$pw = $_REQUEST["pw"];
		if(!isset($_REQUEST["keeplogin"])){
			$login = 0;
		}else{
			$login = $_REQUEST["keeplogin"];
		}
		$verify = $_REQUEST["verify"];
		$upw = md5($user.$pw);
		$vip = getenv('remote_addr');
		if ($verify!=$_SESSION['verify']) {
			echo "<script>alert('验证码错误');location.replace(\"login\");</script>";
			exit();
		}
		$conn = $this->conn;
		$this->sql_ck($user);
		$SQL="SELECT * FROM `user` WHERE `user`='".$user."' AND `passwd`='".$upw."'";
		$query=mysql_query($SQL,$conn)or die(mysql_error());
		if(mysql_num_rows($query)){
			$out=mysql_fetch_array($query);
			$_SESSION['uid']=$out['id'];
			$_SESSION['gid']=$out['gid'];
			$_SESSION['name']=$out['name'];
			$SQL_2= "UPDATE `user` SET `vip`='".$vip."',`last_time`=".time()." WHERE `id`='".$out['id']."'";
			$query_2=mysql_query($SQL_2,$conn)or die(mysql_error());
			if($login==1){
				SetCookie("guest",$user,time()+2592000,"/");
				SetCookie("uid",md5($user.$upw),time()+2592000,"/");
			}
			echo "<script>window.location.href=\"/site/index\";window.event.returnValue = false;</script>";
			unset($_SESSION['verify']);
		}else{
			echo "<script>alert('帐号或密码错误');location.replace(\"login\");</script>";
			exit();
		}
*/
		$record = User::model()->findByAttributes(array('user'=>$this->username));
		
//		print_r($record->getAttributes());

		if(empty($record))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($record['passwd'] !== md5($this->username.$this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->errorCode=self::ERROR_NONE;
			$this->id = $record['id'];
			$this->name = $record['name'];
			//$this->role_id = $record['role_id'];
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getGid()
	{
		return $this->role_id;
	}

	public function getName()
	{
		return $this->name;
	}
	public function getUserName()
	{
		return $this->username;
	}

}
