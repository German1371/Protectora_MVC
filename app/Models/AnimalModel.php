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

namespace App\Models;

class AnimalModel extends DBAbstractModel {

    private $id;
    private $nombre;
    private $raza;
    private $fecha;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getRaza() {
        return $this->raza;
    }
    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function getFecha() {
        return $this->fecha;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }






    public function get($id = '') {
        try {
            $this->query = "SELECT * FROM animales WHERE id = :id";
            $this->params = [':id' => $id];
            $this->get_results_from_query();
            if (count($this->row) > 0) {
                $this->row = $this->row[0];
                return $this->row;
            } else {
                $this->message = "No se encontró el animal con ID: $id";
                return $this->row[0] ?? null;
            }
        } catch (\PDOException $e) {
            $this->message = "Error al obtener el animal: " . $e->getMessage();
            return null;
        }
    }

    public function set() {

        try {
            $this->query = "INSERT INTO animales (nombre, raza, fecha) VALUES (:nombre, :raza, :fecha)";
            $this->params = [
                ':nombre' => $this->nombre,
                ':raza' => $this->raza,
                ':fecha' => $this->fecha
            ];
            $this->execute_single_query();
            $this->message = "Animal agregado correctamente.";
            return true;

        } catch (\PDOException $e) {
            $this->message = "Error al agregar el animal: " . $e->getMessage();
            return false;
        }
    }

    public function delete($id = '') {
        try {
            $this->query = "DELETE FROM animales WHERE id = :id";
            $this->params = [':id' => $id];
            $this->execute_single_query();
            $this->message = "Animal eliminado correctamente.";
            return true;

        } catch (\PDOException $e) {
            $this->message = "Error al eliminar el animal: " . $e->getMessage();
            return false;
        }
    }

    public function edit() {
        try {
            $this->query = "UPDATE animales SET nombre = :nombre, raza = :raza, fecha = :fecha WHERE id = :id";
            $this->params = [
                ':nombre' => $this->nombre,
                ':raza' => $this->raza,
                ':fecha' => $this->fecha,
                ':id' => $this->id
            ];
            $this->execute_single_query();
            $this->message = "Animal actualizado correctamente.";
            return true;

        } catch (\PDOException $e) {
            $this->message = "Error al actualizar el animal: " . $e->getMessage();
            return false;
        }
    }

    public function getAll(){
        $this->query = "SELECT * FROM animales";
        $this->params = [];
        $this->get_results_from_query();
        return $this->row;
    }


}