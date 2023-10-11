<?php

// Here we'll have all our Framework Tools (p.44/91)

declare(strict_types=1);

namespace Framework;

class App
{
  
  private Router $router;

  public function __construct()
  {
   $this->router = new Router();  
  }
  
  public function run()
  {
    // echo 'Application is running Oh glorious Laz boom boom 🧨 <br>';

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $method = $_SERVER['REQUEST_METHOD'];

    $this->router->dispatch($path, $method);  
  }


  public function get(string $path, array $controller) {
    $this->router->add(method: 'GET', path: $path, controller: $controller); //Calls Router class's add() function, via its instantiated object 
  }

  // public function showRouter() {
  //   echo '<br> Laz Router Object: <br>';
  //   dd($this->router);
  // }

}
