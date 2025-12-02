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

namespace App\Controllers;

class BaseController
{
    public function renderHTML($filename, $data = []) {
        ob_start();
        include($filename);
        $content = ob_get_clean();

        include '../views/layouts/base_view.php';
    }
}