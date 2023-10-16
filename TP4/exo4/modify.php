<?php

require_once('database.php');

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['id'])){  
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    updateUser($name, $email, $id);
    header('Location: users.php');
    exit();
}

?>
