<?php 
namespace Thoughts\Controllers;
use \Framework\db;
use \Framework\Authentication;

class Thought {
	private $authorsTable;
	private $thoughtsTable;

	public function __construct(db $thoughtsTable,db $authorsTable,Authentication $authentication){
		$this->thoughtsTable = $thoughtsTable;
		$this->authorsTable = $authorsTable;
		$this->authentication = $authentication;
	}
	public function list(){
		$result = $this->thoughtsTable->findAll();
		$total_thoughts = $this->thoughtsTable->countAll(); 
		$thoughts = $this->thoughtsTable->getThoughts();  
		$author = $this->authentication->getUser();
		$authID = $author['id'];
		return [['title'=>'All Thoughts','template'=>'thoughts.html'],['total_thoughts'=>$total_thoughts,'thoughts' => $thoughts, 'authID'=>$authID]];
	}
	public function home(){
		return [['title'=>'Home','template'=>'home.html'],[]];
	}
	public function add(){
		return [['title'=>'Add thought','template'=>'add.html'],[]];
	}
	public function insert(){
		$author = $this->authentication->getUser();
		$authID = $author['id'];
		$this->thoughtsTable->insert(['text' => $_POST['text'],'authorid'=>$authID]);
		header("Location: /thoughts/thought/list?msg=postedNew");
	}
	public function edit(){
		$author = $this->authentication->getUser();
		$authID = $author['id'];
		$thought = $this->thoughtsTable->getRecord($_GET['id']);  
		$thoughtAuth = $thought['authorid'];
		if($authID != $thought['authorid']){
			return;
		}
		$thought = $this->thoughtsTable->getRecord($_GET['id']);  
			return [['title'=>'Edit thought','template'=>'editthought.html'],['thought' => $thought,'authorid'=>$authID ?? null]];
	}
	public function update(){
		$author = $this->authentication->getUser();
		$authID = $author['id'];
		$thought = $this->thoughtsTable->getRecord($_GET['id']);  
		$thoughtAuth = $thought['authorid'];
		if($authID != $thought['authorid']){
			return;
		}
		$this->thoughtsTable->update(['text' => $_POST['text']],$_POST['id']);
		header("Location: /thoughts/thought/list?msg=updated");
	}
	public function delete(){
		$author = $this->authentication->getUser();
		$authID = $author['id'];
		$thought = $this->thoughtsTable->getRecord($_POST['id']);  
		$thoughtAuth = $thought['authorid'];
		if($authID != $thought['authorid']){
			return;
		}
		$this->thoughtsTable->delete($_POST['id']);
			header("Location: /thoughts/thought/list?msg=deleted");
	}
//end of class
}