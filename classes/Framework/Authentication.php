<?php
namespace Framework;

class Authentication {
	private $users;
	private $username;
	private $password;
	
	public function __construct(db $users,$username,$password){
		session_start();
		$this->users = $users;
		$this->username = strtolower($username);
		$this->password = $password;
	}
	public function login($usr,$pass){
		$usr = strtolower($usr);
		$user = $this->users->find($this->username,$usr);
		if(!empty($user) && password_verify($pass,$user[0][$this->password])){
			session_regenerate_id();
			$_SESSION['usr'] = $usr;
			$_SESSION['pass'] = $user[0][$this->password];
			return true;
		} else {
				return false;
		}
	}
	public function is_LoggedIn(){
		if(empty($_SESSION['usr'])){
			return false;
		}
		$user = $this->users->find($this->username,strtolower($_SESSION['usr']));
		if(!empty($user) && $user[0][$this->password] === $_SESSION['pass']){
			return true;
		} else {
			return false;
		}
	}
	public static function islogin(){
		if(empty($_SESSION['usr'])){
			return false;
		} else {
			return true;
		}
	}
	public function getUser(){
		if($this->is_LoggedIn()){
			return $this->users->find($this->username,strtolower($_SESSION['usr']))[0];
		} else {
			return false;
		}
	}
}