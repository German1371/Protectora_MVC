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

// Definición de la clase abstracta
abstract class DBAbstractModel {
    
    // Asignar variables de configuración estáticas
    private static $db_host = DBHOST;
    private static $db_user = DBUSER;
    private static $db_pass = DBPASS;
    private static $db_name = DBNAME;
    private static $db_port = DBPORT;

    // Asignar variable de conexión
    private static $connection = null;

    protected $error = false;
    protected $message = '';
    protected $query;
    protected $params = [];
    protected $row = [];
    protected $affected_rows = 0; //Numero de filas afectadas por la consulta

    // Métodos abstractos
    abstract protected function get($id = ''); // READ, select
    abstract protected function set(); // CREATE, insert
    abstract protected function delete($id = ''); // DELETE
    abstract protected function edit(); // UPDATE

    // Creamos la conexión (singleton)
    protected function getConnection() {

        // Comprobamos si la variable de conexión es null, si lo es creamos la conexión
        if (self::$connection === null) {
            self::$connection = $this->open_connection();
        }
        return self::$connection;
    }

    // Método para abrir la conexión a la base de datos
    function open_connection() {

    $dsn = sprintf(
        "mysql:host=%s;port=%s;dbname=%s",
        self::$db_host,
        self::$db_port,
        self::$db_name
    );

    try {

        $pdo = new \PDO($dsn, self::$db_user, self::$db_pass);

        // Atributos correctos
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(\PDO::ATTR_PERSISTENT, true);

        // Charset
        $pdo->exec("SET NAMES utf8");

    } catch (\PDOException $th) {
        throw $th;
    }

    return $pdo;
}


    // Método para obtener el último id insertado
    public function lastInsert() {
        return $this->getConnection()->lastInsertId();
    }

    // Método para ejecutar consultas que no devuelven resultados (INSERT, UPDATE, DELETE)
    protected function execute_single_query() {
        try {

            // Obtener la conexión
            $connection = $this->getConnection();
            $statement = $connection->prepare($this->query);
            $result = $statement->execute($this->params);
            $this->affected_rows = $statement->rowCount();
            
            return $result;

        } catch (\PDOException $e) {
            throw new DatabaseException($e->getMessage());
        }
    } 

    // Método para obtener varios resultados
    protected function get_results_from_query() {
        try {

            // Obtener la conexión
            $connection = $this->getConnection();
            $statement = $connection->prepare($this->query);
            $statement->execute($this->params);
            $this->row = $statement->fetchAll();
            $this->affected_rows = $statement->rowCount();

            return $this->row;

        } catch (\PDOException $e) {
            throw new DatabaseException($e->getMessage());
        }
    }

    // Método para obtener un solo resultado
    protected function get_single_result() {

        // Llamamos al método para obtener varios resultados
        $this->get_results_from_query();
        return $this->rows[0] ?? null;
    }

    // Método para obtener el estado de error
    public function getMessage() {
        return $this->message;
    }

    // Método para confirmar una transacción
    public function commit() {
        $this->getConnection()->commit();
    }

    // Método para iniciar una transacción
    public function beginTransaction() {
        $this->getConnection()->beginTransaction();
    }

    // Método para deshacer una transacción
    public function rollBack() {
        $this->getConnection()->rollBack();
    }

    // Método para obtener las filas devueltas por la última consulta
    public function getRows() {
        return $this->row;
    }

    // Método para obtener el número de filas afectadas por la última consulta
    public function getAffectedRows() {
        return $this->affected_rows;
    }

    // Método para limpiar los parámetros de la consulta
    protected function clearParameters() {
        $this->params = [];
        $this->query = '';
        $this->rows = [];
        $this->affected_rows = 0;
    }

    // Método para cerrar la conexión a la base de datos
    public function closeConnection() {
        self::$connection = null;
    }   
}

?>