<?php 

require_once('config.php');

$connectionString = "mysql:host=" . _MYSQL_HOST;

if (defined('_MYSQL_PORT'))
    $connectionString .= ";port=" . _MYSQL_PORT;

$connectionString .= ";dbname=" . _MYSQL_DBNAME;

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    if(isset($_POST['name']) && isset($_POST['email'])){  
        $name = $_POST['name'];
        $email = $_POST['email'];

        $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $request = $pdo->prepare('INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL, :name, :email)');
        $request->bindParam(':name', $name, PDO::PARAM_STR);
        $request->bindParam(':email', $email, PDO::PARAM_STR);
        $request->execute();
        
        // Rediriger vers la page 'users.php' après l'insertion
        header('Location: users.php');
        exit(); // Assurez-vous de terminer le script ici
    }
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
}
