<?php

declare(strict_types=1);

namespace Framework;

class Router
{

  private array $routes = [];
  
  public function add(string $method, string $path, array $controller)
  {

    $path = $this->normalizePath($path);
    $this->routes[] = [
      'path' => $path,
      'method' => strtoupper($method),
      'controller' => $controller,
    ];
  }

  private function normalizePath(string $path): string
  {
    $path = trim($path, '/');
    $path = "/{$path}/";
    $path = preg_replace('#[/]{2,}#', '/', $path);

    return $path;
  }

  public function dispatch(string $path, string $method)
  {

    // Laz Debug
    // echo 'Show routes array content:<br>';
    // var_dump($this->routes);

    $path = $this->normalizePath($path);
    $method = strtoupper($method);

    // var_dump($this->routes); // empty array

    foreach ($this->routes as $route) {
     
      if (!preg_match("#^{$route['path']}$#", $path) || $route['method'] !== $method) {
        // var_dump($route);
        
        continue;
      }

      [$class, $function] = $route['controller'];

      $controllerInstance = new $class;
      // var_dump($controllerInstance);

      $controllerInstance->$function();

    }
  }
}
