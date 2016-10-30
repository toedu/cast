<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 16/10/30
 * Time: 00:12
 */
error_reporting (E_ALL);

require('../vendor/autoload.php');

use NoahBuscher\Macaw\Macaw;

Macaw::get('/', function() {
    echo 'Hello world!';
    include_once '../views/index.blade.php';
});


Macaw::get('/login',  'Controllers\HomeController@login');

Macaw::dispatch();

//include_once '../views/index.blade.php';