<?php

require_once('config.php');

$connectionString = "mysql:host=" . _MYSQL_HOST;

if (defined('_MYSQL_PORT'))
    $connectionString .= ";port=" . _MYSQL_PORT;

$connectionString .= ";dbname=" . _MYSQL_DBNAME;

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
}

function updateUser($name, $email, $id) {
    global $pdo;
    
    $request = $pdo->prepare('UPDATE `users` SET `name` = :name, `email` = :email WHERE `users`.`id` = :id'); 
    $request->bindParam(':name', $name, PDO::PARAM_STR);
    $request->bindParam(':email', $email, PDO::PARAM_STR);
    $request->bindParam(':id', $id, PDO::PARAM_STR);
    $request->execute();

    if ($request->rowCount() > 0) {
        return ['name' => $name, 'email' => $email];
    } else {
        return null; // Retourner null en cas d'échec de la mise à jour
    }
}
function createUser($name, $email) {
    global $pdo;
    $request = $pdo->prepare('INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL, :name, :email)');
    $request->bindParam(':name', $name, PDO::PARAM_STR);
    $request->bindParam(':email', $email, PDO::PARAM_STR);
    $request->execute();

    return ['id' => $pdo->lastInsertId()];
}
function deleteUser($id) {
    global $pdo;
    $request = $pdo->prepare('DELETE FROM `users` WHERE `id`= :id');
    $request->bindParam(':id', $id, PDO::PARAM_STR);
    $request->execute();

    return $request->rowCount() > 0; // Renvoie true si au moins une ligne a été supprimée, sinon false
}

function getAllUsers(){
    global $pdo;
    $request = $pdo->prepare("SELECT * FROM users");
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

?>
