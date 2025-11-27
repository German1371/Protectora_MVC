<?php

namespace App\Services;

use App\Models\AnimalModel;

class AnimalService {
    
    private $animalModel;

    public function __construct() {
        $this->animalModel = new AnimalModel();
    }

    public function addAgesToAnimals() {

        // Obtenemos todos los animales
        $animales = $this->animalModel->getAll();
        $currentDate = new \DateTime();
        foreach ($animales as &$animal) {
            $birthDate = new \DateTime($animal['fecha']);
            $age = $currentDate->diff($birthDate)->y;
            $animal['edad'] = $age;
        }
        return $animales;
    }
}