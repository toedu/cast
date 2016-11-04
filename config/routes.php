<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 16/11/1
 * Time: 18:49
 */

use NoahBuscher\Macaw\Macaw;

Macaw::get('/',             'Web\Controllers\HomeController@index');

Macaw::get('/(:num)',       'Web\Controllers\HomeController@channel');

Macaw::any('/register',     'Web\Controllers\HomeController@register');
//Macaw::post('/register',    'Web\Controllers\HomeController@register');
Macaw::get('/login',        'Web\Controllers\HomeController@login');
Macaw::post('/login',       'Web\Controllers\HomeController@doLogin');

Macaw::dispatch();