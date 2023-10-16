<?php
require_once('config.php');

try {
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $pdo = new PDO('mysql:host='. _MYSQL_HOST.';port=' . _MYSQL_PORT.';dbname='. _MYSQL_DBNAME , _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Chemin du fichier SQL
    $sqlFile = 'sql/create_db.sql';

    // Lire le contenu du fichier SQL
    $sqlContent = file_get_contents($sqlFile);

    // Exécuter les requêtes SQL
    $pdo->exec($sqlContent);

    echo "Le fichier $sqlFile a été exécuté avec succès.";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermer la connexion
$pdo = null;
?>
