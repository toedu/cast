<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 16/10/30
 * Time: 00:12
 */

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

define('PUBLIC_PATH', __DIR__);

define('VIEW_BASE_PATH', '../app/web/views/');

require('../vendor/autoload.php');

require('../config/routes.php');
