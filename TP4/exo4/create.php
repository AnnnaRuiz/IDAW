<?php

require_once('database.php');

if(isset($_POST['name']) && isset($_POST['email'])){  
    $name = $_POST['name'];
    $email = $_POST['email'];

    createUser($name, $email, $id);
    header('Location: users.php');
    exit();
}

?>
