<?php 
namespace Thoughts;
use \Framework\db;
use \Thoughts\Controllers\Thought;
use \Thoughts\Controllers\Author;
use \Thoughts\Controllers\Login;

class ThoughtRoutes implements \Framework\Routes {
	private $authorsTable;
	private $thoughtsTable;
	private $authentication;

	public function __construct(){
		$this->authorsTable = new \Framework\db('authors','id');
		$this->thoughtsTable = new \Framework\db('thoughts','id');
		$this->authentication = new \Framework\Authentication($this->authorsTable,'email','hash');
	}
	public function getRoutes(): array {
		$thoughtsTable = new \Framework\db('thoughts','id');   
		$authorsTable = new \Framework\db('authors','id'); 
		$Thought = new \Thoughts\Controllers\Thought($thoughtsTable,$authorsTable,$this->authentication);
		$Author = new \Thoughts\Controllers\Author($authorsTable);
		$Login = new \Thoughts\Controllers\Login($this->authentication);
		$routes = [ 
				// home
				'thoughts/' => [
					'GET' => [
						'controller' => $Thought,						
						'action' => 'home'						
					]
				],
				'thoughts/index.php' => [
					'GET' => [
						'controller' => $Thought,						
						'action' => 'home'						
					]
				],
				'thoughts/thought/list' => [
					'GET' => [
						'controller' => $Thought,
						'action' => 'list'
					]
				],
				'thoughts/thought/add' => [
					'GET' => [
						'controller' => $Thought,
						'action' => 'add'
					],
					'POST' => [
						'controller' => $Thought,
						'action' => 'insert'
					],
					'login' => true
				],
				'thoughts/thought/edit' => [
					'GET' => [
						'controller' => $Thought,
						'action' => 'edit'
					],
					'POST' => [
						'controller' => $Thought,
						'action' => 'update'
					],
					'login' => true
				],
				'thoughts/thought/delete' => [
					'POST' => [
						'controller' => $Thought,
						'action' => 'delete'
					],
					'login' => true
				],
				'thoughts/authors/list' => [
					'GET' => [
						'controller' => $Author,
						'action' => 'list'
					]
				],
				'thoughts/register' => [
					'GET' => [
						'controller' => $Author,
						'action' => 'register'
					],
					'POST' => [
						'controller' => $Author,
						'action' => 'insert'
					]
				],
				'thoughts/register/success' => [
					'GET' => [
						'controller' => $Author,
						'action' => 'success'
					]
				],
				'thoughts/login' => [
					'GET' => [
						'controller' => $Login,
						'action' => 'login'
					],
					'POST' => [
						'controller' => $Login,
						'action' => 'login_user'
					]
				],
				'thoughts/logout' => [
					'GET' => [
						'controller' => $Login,
						'action' => 'logout'
					],
					'POST' => [
						'controller' => $Login,
						'action' => 'login_user'
					],
					'login' => true
				],
				'thoughts/login/success' => [
					'GET' => [
						'controller' => $Login,
						'action' => 'success'
					],
					'login' => true
				],
				'thoughts/login/error' => [
					'GET' => [
						'controller' => $Login,
						'action' => 'error'
					]
				]
		//add new route here
		];
		return $routes;
	}
	public function getAuthentication(): \Framework\Authentication {
		return $this->authentication;
	}
} // end of class