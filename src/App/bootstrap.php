<?php

declare(strict_types=1);

// include __DIR__ . '/../Framework/App.php';
require __DIR__ . '/../../vendor/autoload.php';

use Framework\{App, Router};
use App\Controllers\HomeController;

$app = new App();

$app->get(path:'/', controller:[HomeController::class, 'home']);

$app -> run(); 


// dd($app);


// Probably need to delete this altogether
// $router = new Router();


//Attention! dd KILLS further code
// dd($app);

return $app;
