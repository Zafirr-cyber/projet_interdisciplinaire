<?php

require_once  '../../../config/database.php';

class Departement {
    private $conn;
    private $table_name = "departement";

    public $departement_id;
    public $departement_nom;
    public $department_description;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();

    }

    public function read() {
        if ($this->conn === null) {
            throw new Exception("Database connection failed");
        }
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $test = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $test;
    }
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (departement_nom, departement_description) VALUES (:nom, :description)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nom', $this->departement_nom);
        $stmt->bindParam(':description', $this->departement_description);
        return $stmt->execute();
    }
    
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE departement_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET departement_nom = :nom, departement_description = :description WHERE departement_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nom', $this->departement_nom);
        $stmt->bindParam(':description', $this->departement_description);
        $stmt->bindParam(':id', $this->departement_id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE departement_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>