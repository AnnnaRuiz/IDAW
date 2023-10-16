<?php

require_once('database.php');

if(isset($_POST['id'])){  
    $id = $_POST['id'];

    deleteUser($id);
    header('Location: users.php');
    exit();
}

?>
