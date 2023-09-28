<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "kevoh");
define("DB_NAME", "backbone");

// db.php

class Database_conn {
    private static $instance = null;
    private $connection;

    private function __construct() {
        // Establish the database connection here
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database_conn();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}

?>