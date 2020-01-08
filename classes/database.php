<?php
class Database {

    // connectino information
    private $dbhost = "localhost";
    private $dbname = "crudbase";
    private $dbuser = "root";
    private $dbpass = "";
    public $conn;

    // security connection
    public function dbConnection() {
        
        $this->conn = null;

        try {
           $this->conn = new PDO("mysql:host=$this->dbhost; dbname=$this->dbname", $this->dbuser, $this->dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            echo "Connection error: ". $e->getMessage();
        }
        return $this->conn;
    }


}