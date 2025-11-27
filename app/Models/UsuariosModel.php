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

class UsuariosModel extends DBAbstractModel {

    private $id;
    private $username;
    private $email;
    private $telefono;
    private $password;
    private $nombre;
    private $apellido;
    private $direccion;
    private $rol;
    private $created_at;
    private $update_at;
    private $activo;
    private $ultimo_login;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }
    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function getTelefono() {
        return $this->telefono;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }   
    public function getNombre() {
        return $this->nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function getApellido() {
        return $this->apellido;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function getDireccion() {
        return $this->direccion;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }
    public function getRol() {
        return $this->rol;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }
    public function getActivo() {
        return $this->activo;
    }

    public function setUltimoLogin($ultimo_login) {
        $this->ultimo_login = $ultimo_login;
    }
    public function getUltimoLogin() {
        return $this->ultimo_login;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setUpdateAt($update_at) {
        $this->update_at = $update_at;
    }
    public function getUpdateAt() {
        return $this->update_at;
    }

    public function get($id = '') {
        try {
            $this->query = "SELECT * FROM usuarios WHERE id = :id";
            $this->params = [':id' => $id];
            $this->get_results_from_query();
            if (count($this->row) > 0) {
                $this->row = $this->row[0];
                return $this->row;
            } else {
                $this->message = "No se encontrÃ³ el usuario con ID: $id";
                return $this->row[0] ?? null;
            }
        } catch (\PDOException $e) {
            $this->message = "Error al obtener el usuario: " . $e->getMessage();
            return null;
        }
    }

    public function set() {

        try {
            $this->query = "INSERT INTO usuarios(id, username, email, telefono, password, nombre, apellido, direccion, rol, created_at, update_at, activo, ultimo_login) VALUES (:id, :username, :email, :telefono, :password, :nombre, :apellido, :direccion, :rol, :created_at, :update_at, :activo, :ultimo_login)";
            $this->params = [
                ':id' => $this->id,
                ':username' => $this->username,
                ':email' => $this->email,
                ':telefono' => $this->telefono,
                ':password' => $this->password,
                ':nombre' => $this->nombre,
                ':apellido' => $this->apellido,
                ':direccion' => $this->direccion,
                ':rol' => $this->rol,
                ':created_at' => $this->created_at,
                ':update_at' => $this->update_at,
                ':activo' => $this->activo,
                ':ultimo_login' => $this->ultimo_login
            ];
            $this->execute_single_query();
            $this->message = "Usuario agregado correctamente.";
            return true;

        } catch (\PDOException $e) {
            $this->message = "Error al agregar el usuario: " . $e->getMessage();
            return false;
        }
    }

    public function delete($id = '') {
        try {
            $this->query = "DELETE FROM usuarios WHERE id = :id";
            $this->params = [':id' => $id];
            $this->execute_single_query();
            $this->message = "Usuario eliminado correctamente.";
            return true;

        } catch (\PDOException $e) {
            $this->message = "Error al eliminar el usuario: " . $e->getMessage();
            return false;
        }
    }

    public function edit() {
        try {
            $this->query = "UPDATE usuarios SET username = :username, email = :email, telefono = :telefono, password = :password, nombre = :nombre, apellido = :apellido, direccion = :direccion, rol = :rol, created_at = :created_at, update_at = :update_at, activo = :activo, ultimo_login = :ultimo_login WHERE id = :id";
            $this->params = [
                ':username' => $this->username,
                ':email' => $this->email,
                ':telefono' => $this->telefono,
                ':password' => $this->password,
                ':nombre' => $this->nombre,
                ':apellido' => $this->apellido,
                ':direccion' => $this->direccion,
                ':rol' => $this->rol,
                ':activo' => $this->activo,
                ':ultimo_login' => $this->ultimo_login,
                ':id' => $this->id
            ];
            $this->execute_single_query();
            $this->message = "Usuario actualizado correctamente.";
            return true;

        } catch (\PDOException $e) {
            $this->message = "Error al actualizar el usuario: " . $e->getMessage();
            return false;
        }
    }

    public function getAll(){
        $this->query = "SELECT * FROM usuarios";
        $this->params = [];
        $this->get_results_from_query();
        return $this->row;
    }

}
