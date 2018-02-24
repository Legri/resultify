<?php
//echo(ROOT);
class Router {
	
	private $routes;
	
	function __construct() {
		$routesPath=ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}
	
	private function getURI(){
		if (!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'],'/');
		}
	}
	
	public function run(){
		
		$uri = $this->getURI();
	
		if (!$uri){
			$uri = 'main';
		}
	
		foreach ($this->routes as $uriPattern => $path){
			
			if((preg_match("~$uriPattern~", $uri))){
				
				$internalRoute = preg_replace("~$uriPattern~",$path, $uri) ;
				
				$segments= explode('/' , $internalRoute);
				
			
				$controllerName = array_shift($segments).'Controller';
				
				$controllerName = ucfirst($controllerName);
		
				$actionName= 'action'.ucfirst(array_shift($segments));
				
				$parameters = $segments;
				
				$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
				
				if (file_exists($controllerFile)){
					include_once($controllerFile);
					if (!method_exists($controllerName,$actionName)){
						break;
					}
				}
				
				$controllerObject = new $controllerName;
				
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if ($result != null ){
					break;
				}
			}
			
		}
		//echo $controllerName;
		if (!$controllerName)
			{
	
				include_once(ROOT.'/controllers/404_Controller.php');
				ControllerErr404::err404();
			}
	}
	
}