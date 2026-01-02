<?php

class User {
    private $conn;

    private $getAllQuery = "SELECT * FROM users ORDER BY id DESC";
    private $createUserQuery = "INSERT INTO users (first_name, last_name, age) VALUES (?, ?, ?)";
    private $getUserQuery = "SELECT * FROM users WHERE first_name LIKE ? ORDER BY id DESC";
    private $deleteQuery = "DELETE FROM users WHERE first_name = ? AND last_name = ?";

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllUsers() {
        $stmt = $this->conn->prepare($this->getAllQuery);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUser(string $firstname) {
        $fname = '%'.$firstname.'%';
        $stmt = $this->conn->prepare($this->getUserQuery);
        $stmt->bind_param("s", $fname);
        $stmt->execute();
        
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function CreateUser(string $firstname, string $lastname, int $age) {
        $stmt = $this->conn->prepare($this->createUserQuery);
        $stmt->bind_param("ssi", $firstname, $lastname, $age);
        return $stmt->execute();
    }

    public function DeleteUser(string $firstname, string $lastname) {
        $stmt = $this->conn->prepare($this->deleteQuery);
        $stmt->bind_param("ss", $firstname, $lastname);
        return $stmt->execute();
    }
}

?>