<?php

require_once('database.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $result = getAllUsers();

        header('Content-type: application/json');
        exit(json_encode($result));
    
    case 'POST':
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = createUser($name, $email);

    if ($user) {
        // Utilisateur créé avec succès
        http_response_code(201);
        header('Content-Type: application/json');
        exit(json_encode($user));
    } else {
        // Erreur lors de la création de l'utilisateur
        http_response_code(500); // Code d'erreur 500 Internal Server Error
        exit(json_encode(["message" => "Erreur lors de la création de l'utilisateur"]));
    }
        http_response_code(501); // à implémenter
        exit(-1);
}

 // Close the database connection
$pdo = null;

?>
   