<?php

declare(strict_types=1);


namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;


class HomeController
{

  // Instead of $view, we should have called it $templateEngine, to be aligned with Class name it was instantiated from
  private TemplateEngine $view;


  public function __construct()
  {
    //Instantiates TemplateEngine class, setting the Path to VIEW 
    $this->view = new TemplateEngine(Paths::VIEW);
  }


  //home() runs in *bootstrap.php*, via  $app->get(path:'/', controller:[HomeController::class, 'home']);
  public function home()
  {
    // $secret = 'This is a secret';
   echo $this->view->render('index.php', ['title' => 'Home page from render' ]);
  }

}
