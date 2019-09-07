<?php
namespace Thoughts\Controllers;
use \Framework\db;

class Author {
	private $authorsTable;

	public function __construct(db $authorsTable){
		$this->authorsTable = $authorsTable;
	}	
	public function list(){
		$authors = $this->authorsTable->findAll();
		return [['title'=>'Authors','template'=>'authors.html'],['authors'=>$authors]];
	}
	public function viewAuthor(){
		return [['title'=>'Author Page','template'=>'auth.html'],[]];
	}
	public function register(){
		return [['title'=>'Register','template'=>'register.html'],[]];
	}
	public function success(){
		return [['title'=>'Successful','template'=>'registersuccess.html'],[]];
	}
	public function profile(){
		return [['title'=>'Welcome Home','template'=>'dash.html'],[]];
	}
	public function insert(){
		$name = $_POST['author'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$valid = true;
		$err = [];
		if(empty($name)){
			$valid = false;
			$err['name'] = 'Name cannot be blank';
		}
		if(empty($email)){
			$valid = false;
			$err['email'] = 'email cannot be blank';
		} elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
			$valid = false;
			$err['email'] = 'invalid email address';
		} else {
			$email = strtolower($email);
			if(count($this->authorsTable->find('email',$email)) > 0){
				$valid = false;
				$err['email'] = 'the email address is already registered';
			}
		} 
		if(empty($pass)){
			$valid = false;
			$err['pass'] = 'password cannot be blank';
		}
		if($valid == true){
			$pass = password_hash($pass,PASSWORD_DEFAULT,['cost'=>10]);
			$this->authorsTable->insert(['name' => $name,'email' => $email,'hash'=>$pass]);
			header('location: /thoughts/register/success');
		} else {
			return [['title'=>'Register','template'=>'register.html'],['errors'=> $err,'data' => ['name'=>$name,'email'=>$email,'pass'=>$pass]]];
		}
	}
// end of Author COntroller
}