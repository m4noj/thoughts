<?php require_once __DIR__.'/inc/autoloader.php';

	$route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');

	$Route = new \Framework\Route($route,new \Thoughts\ThoughtRoutes,$_SERVER['REQUEST_METHOD']);

	$Route->run();

