<?php

require_once('database.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':

        parse_str(file_get_contents("php://input"),$get_data);
        if (isset($get_data['id'])){
            $id = $get_data['id'];
            $read_user = read_user($id);
            if ($read_user) {
                header('Content-type: application/json');
                http_response_code(200);
                exit(json_encode($read_user));
            }
            else {
                http_response_code(404);
                exit(json_encode(["message" => "Utilisateur non trouvé."]));
            }
        }  
        else {
            $result = getAllUsers();
            header('Content-type: application/json');
            http_response_code(200);
            exit(json_encode($result));
        }

    
    case 'POST':
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = createUser($name, $email);

    if ($user != null) {
        // Utilisateur créé avec succès
        http_response_code(201); // Code 201 created 
        header('Content-Type: application/json');
        exit(json_encode($user));
    } else {
        // Erreur lors de la création de l'utilisateur
        http_response_code(500); // Code d'erreur 500 Internal Server Error
        exit(json_encode(["message" => "Erreur lors de la création de l'utilisateur"]));
    }

    case 'PUT':
        parse_str(file_get_contents("php://input"), $putData);

        if(isset($putData['name']) && isset($putData['email']) && isset($putData['id'])){
            $name = $putData['name'];
            $email = $putData['email'];
            $id = $putData['id'];

            $updatedUser = updateUser($name, $email, $id);

            if ($updatedUser !== null) {
                http_response_code(200); // Code 200 OK
                header('Content-Type: application/json');
                exit(json_encode($updatedUser));
            } else {
                http_response_code(404); // Code d'erreur 404 Not Found
                exit(json_encode(["message" => "Utilisateur non trouve"]));
            }
        } else {
            http_response_code(400); // Code d'erreur 400 Bad Request
            exit(json_encode(["message" => "Parametres invalides pour la mise a jour de l'utilisateur"]));
        }
        break;

        case 'DELETE':
            parse_str(file_get_contents("php://input"), $deleteData);
        
            if(isset($deleteData['id'])){
                $id = $deleteData['id'];
        
                $deleted = deleteUser($id);
        
                if ($deleted) {
                    http_response_code(200); // Code 200 OK
                    exit( json_encode(["message" => "Utilisateur supprime avec succes"]));
                } else {
                    http_response_code(404); // Code d'erreur 404 Not Found (si l'utilisateur avec cet ID n'existe pas)
                    exit( json_encode(["message" => "Utilisateur non trouve"]));
                }
            } else {
                http_response_code(400); // Code d'erreur 400 Bad Request
                exit( json_encode(["message" => "Parametres invalides pour la suppression de l'utilisateur"]));
            }
            break;

            default: 
                http_response_code(501);
                exit(json_encode(["message" => "Not implemented"]));
}
 // Close the database connection
$pdo = null;

?>
   