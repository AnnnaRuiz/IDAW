<?php 

require_once('config.php');

$connectionString = "mysql:host=" . _MYSQL_HOST;

if (defined('_MYSQL_PORT'))
    $connectionString .= ";port=" . _MYSQL_PORT;

$connectionString .= ";dbname=" . _MYSQL_DBNAME;

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    if(isset($_POST['id'])){  
        $id = $_POST['id'];

        $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $request = $pdo->prepare('DELETE FROM `users` WHERE `id`= :id');
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->execute();
        
        // Rediriger vers la page 'users.php' après l'insertion
        header('Location: users.php');
        exit(); // Assurez-vous de terminer le script ici
    }
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
}
