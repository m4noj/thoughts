<?php 
namespace Thoughts\Controllers;

class Login {
	private $auth;

	public function __construct(\Framework\Authentication $authentication){
		$this->auth = $authentication;
	}
	public function error(){
		return [['title'=>'[ERROR] Not Logged in','template'=>'loginerr.html'],[]];
	}
	public function success(){
		return [['title'=>'you are now logged in','template'=>'loginsuccess.html'],[]];
	}
	public function login(){
		return [['title'=>'Login Page','template'=>'login.html'],['msg' => '']];
	}
	public function login_user(){
		if($this->auth->login($_POST['email'],$_POST['password'])){
			header("Location: /thoughts/login/success");
		} else {
			return  [['title'=>'Login Page','template'=>'login.html'],['msg' => 'Invalid username or email']];
		}
	}
	public function logout(){
		session_destroy();
		unset($_SESSION);
		return  [['title'=>'Login Page','template'=>'login.html'],['msg' => 'you are now logged out!']];
	}
//end of login 
}