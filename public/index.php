<?php 

require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../controllers/UserController.php";

$controller = new UserController($conn);
$controller->Store();
$controller->Remove();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning</title>
    <link rel="stylesheet" href="./stylesheets/index.css">
</head>
<body>
    <h1>User List</h1>
    <h2>Add User</h2>
    <form class="form" method="post">
        <input type="text" name="firstname">
        <input type="text" name="lastname">
        <input type="number" name="age">
        <button type="submit" name="create_user_btn">Submit</button>
    </form>
    <hr>
    <h2>Search User</h2>
    <form class="form" method="post">
        <input type="text" name="firstname_search">
        <button type="submit" name="search_btn">Search</button>
    </form>
    <br>
    <br>
    <hr>
    <?php $controller->Index(); ?>
</body>
</html>