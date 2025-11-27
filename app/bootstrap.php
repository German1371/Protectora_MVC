<?php

/**
 * @author: German Cosano Torres
 *
 * descripcion: 
 *
 * fecha: 25/11/2025
 *
 * @license: Proprietary 
 * 
 * @package: protectora_mvc\app\Controllers\UsuariosController.php
 *
 * @version: 1.0
 */

define('APP_ROOT', dirname(__DIR__));
define('VENDOR_DIR', APP_ROOT . '/vendor');
define('APP_DIR', APP_ROOT . '/app');
define('PUBLIC_DIR', APP_ROOT . '/public');
define('CSS_DIR', PUBLIC_DIR . '/styles');
define('JS_DIR', PUBLIC_DIR . '/js');
define('IMG_DIR', PUBLIC_DIR . '/images'); 


require_once VENDOR_DIR . '/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

define ('DBHOST', $_ENV['DBHOST']);
define ('DBUSER', $_ENV['DBUSER']);
define ('DBPASS', $_ENV['DBPASS']);
define ('DBNAME', $_ENV['DBNAME']);
define ('DBPORT', $_ENV['DBPORT']);