<?php 
class DataBase {
    private $hostname = "localhost";
    private $dbname = "learn";
    private $username = "root";
    private $password = "";

    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Error connecting to Database : " . mysqli_connect_error());
        }
    }

    public function Connect() 
    {
        return $this->conn;
    }
}
?>