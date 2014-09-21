<?php
namespace Simgent;

class Router {
	public $routes;

	public function __construct(array $routes) {
		$this->routes = $routes;
	}

}