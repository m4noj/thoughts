<?php 
namespace Framework;

class Route {
	private $route;
	private $routes;
	private $method;

	public function __construct(string $route,\Framework\Routes $routes,string $method){
		$this->route = $route;
		$this->routes = $routes;
		$this->method = $method;
		$this->checkURL();
	}
	// check for lowercase
	private function checkURL(){
		if($this->route !== strtolower($this->route)){
			http_response_code(301);
			header('Location: '.strtolower($this->route));
		}
	}
	//  call view
	private function getView($vars){
		extract($vars[0]);
		extract($vars[1]);
		$loggedIn = \Framework\Authentication::islogin(); 
		ob_start();
		include __DIR__."/../../views/".$template.".php";
		$output = ob_get_clean();
		include __DIR__."/../../inc/layout.php";
	}
	// get route, call controller and return view
	public function run(){
		$routes = $this->routes->getRoutes();
		$auth = $this->routes->getAuthentication();
		if(isset($routes[$this->route]['login']) && isset($routes[$this->route]['login']) && !$auth->is_LoggedIn()){
			header('Location: /thoughts/login/error');
		} 
		$controller = $routes[$this->route][$this->method]['controller'];
		$action = $routes[$this->route][$this->method]['action'];
		$page = $controller->$action();
		return $this->getView($page);
	}
} // end of class