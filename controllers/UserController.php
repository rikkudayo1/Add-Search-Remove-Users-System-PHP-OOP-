<?php 

class UserController {
    private $user;

    public function __construct($conn)
    {
        $this->user = new User($conn);
    }

    public function Index(): void {
        $users = $this->user->getAllUsers();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_btn'])) {
            $firstname = $_POST['firstname_search'];
            $users = $this->user->getUser($firstname);
        }
        require __DIR__ . "/../views/User/index.php";
    }

    public function Store(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user_btn'])) {
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $age = (int) $_POST['age'];

            if ($firstName && $lastName && $age) {
                $this->user->CreateUser($firstName, $lastName, $age);
            }

            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }

    public function Remove(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_btn'])) {
            $firstname = $_POST['dl_fn'];
            $lastname = $_POST['dl_ln'];

            if ($firstname && $lastname) {
                $this->user->DeleteUser($firstname, $lastname);
            }

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}
?> 