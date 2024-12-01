<?php

class Database {
    private $host = 'db';
    private $db_name = 'courses';
    private $username = 'root';
    private $password = 'root';
    private $connection;

    public function connect() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $this->connection;
    }
}
