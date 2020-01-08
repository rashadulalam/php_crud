<?php

require_once "database.php";

class User {
    private $conn;

    //constructor 
    public function __construc() {
        public $dabase = new Database();
        public $db = $database->dbConnection();
        $this->conn = $db;
    }

    // execute query
    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    //insert
    public function insert($name, $email) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO users VALUES(:name, :email)")
            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":email", $email);

            $stmt->execute();
            return $stmt;
        }catch (PDOException  $e) {
                echo $e->getMessage();
            }
    }

    //update
    public function update($name, $email, $id) {
        try {
            $stmt = $this->conn->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // delete
    public function delete() {
        try {
            $stmt = $this->conn->prepare("DELETE FROM users WHERE id=:id");
            $stmt->bindparam($sql);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // redirect
    public function redirect($url) {
        header("Location: $url");
    }

}