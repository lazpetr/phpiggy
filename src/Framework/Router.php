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
    // echo 'dispatch method run';

    $path = $this->normalizePath($path);
    $method = strtoupper($method);

    var_dump($this->routes); // empty array

    // foreach ($this->routes as $route) {
    //   if (!preg_match("#^{$route['path']}$#", $path) || $route['method'] !== $method) {
    //     // continue;
    //     echo 'route NOT found';
    //   }
    //   echo 'route found!';
    // }

    foreach ($this->routes as $route) {
      // echo '<br>' .'That\'s route\'s key:  ' .$key . '<br>' . 'Route\'s path:' .  $route['path'];

      if (!preg_match("#^{$route['path']}$#", $path) || $route['method'] !== $method) {
        // continue;
        echo 'route NOT found!';
        continue;
      }
      echo 'route found!';
    }

    // Test Laz
    // print_r($this->routes);
    // var_dump($this->routes);


    // echo 'Path is: ' . $path . ' Method is: ' . $method;
  }
}
