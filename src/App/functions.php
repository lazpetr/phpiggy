<?php
  
  declare(strict_types=1);

  // namespace App;


  function dd (mixed $value) {
    echo '<pre>';
    // print_r($value);
    var_dump($value);
    echo '</pre>';
    die(); //Stop generating rest of page (from wherever it's called)
  }