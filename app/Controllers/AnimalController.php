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

use App\Services\AnimalService;

class AnimalController extends BaseController {

    public function animalAction() {
        // Creamos el modelo y el servicio
        $animalService = new AnimalService();
        // Calculamos la edad de cada animal
        $animales = $animalService->addAgesToAnimals();

        // Datos a enviar a la vista
        $data = ['animales' => $animales];

        // Renderizamos la vista
        $this->renderHTML(__DIR__ . '/../../views/animalView.php', $data);
    }
}
