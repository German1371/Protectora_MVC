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

require_once '../../vendor/autoload.php';

define ('DBHOST', $_ENV['DB_HOST']);
define ('DBUSER', $_ENV['DB_USER']);
define ('DBPASS', $_ENV['DB_PASS']);
define ('DBNAME', $_ENV['DB_NAME']);
define ('DBPORT', $_ENV['DB_PORT']);
use App\Models\AnimalModel;

$animalModel = new AnimalModel();
// Crear animales
$animalModel->setNombre('firulais');
$animalModel->setRaza('labrador');
$animalModel->setFecha('2020-05-10');
$animalModel->set();

$animalModel->setNombre('bella');
$animalModel->setRaza('siamés');
$animalModel->setFecha('2018-11-23');
$animalModel->set();

// Obtener animal con ID 1
echo "Obtener animal con ID 1:\n";
$result = $animalModel->get(1);
print_r($result);
echo "<br>";
echo "<br>";
// Modificar animal con ID 1
echo "Modificar animal con ID 1:\n";
$animalModel->edit(1, 'max', 'pastor aleman', '2019-03-15');
$updated = $animalModel->get(1);
print_r($updated);
echo "<br>";
echo "<br>";
// Eliminar animal con ID 2
echo "Eliminar animal con ID 2:\n";
$animalModel->delete(2);
echo "<br>";
echo "<br>";
// Lista de todos los animales
echo "Lista de todos los animales:\n";
$allAnimals = $animalModel->getAll();

foreach ($allAnimals as $animal) {
    echo "ID: {$animal['id']}, Nombre: {$animal['nombre']}, Raza: {$animal['raza']}, Fecha: {$animal['fecha']}\n";
}
