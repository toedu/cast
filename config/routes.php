<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 16/11/1
 * Time: 18:49
 */

use NoahBuscher\Macaw\Macaw;

Macaw::get('/',             'Web\Controllers\HomeController@index');
Macaw::get('/list',         'Web\Controllers\HomeController@channelList');
Macaw::get('/(:num)',       'Web\Controllers\HomeController@channel');
Macaw::get('/cast',         'Web\Controllers\HomeController@cast');

Macaw::any('/register',     'Web\Controllers\HomeController@register');
Macaw::any('/login',        'Web\Controllers\HomeController@login');
Macaw::get('/logout',       'Web\Controllers\HomeController@logout');

Macaw::dispatch();