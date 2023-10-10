<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Heure Courante</title>
</head>
<body>
    <h1> Bienvenue sur cette page </h1>
    <p>L'heure courante est :</p>
    <p><?php
        $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
        echo $date->format('H:i:s');
    ?></p>

<?php 
    function afficher($prenom, $nom){
        echo "Bienvenue " . $prenom . " " . $nom . "<br>";
    }

    $personnes = array(
        array( 'prenom' => 'Adele', 'nom' => 'Patarot'),
        array('prenom' => 'Anthony', 'nom' => 'Charreyron'),
        array('prenom' => 'Anna', 'nom' => 'Ruiz')
    );

    for ($i=0; $i<sizeof($personnes);$i++){
        afficher($personnes[$i]['prenom'], $personnes[$i]['nom']);
    }
?>

<form method="get">
    Entrez votre prénom, puis validez : 
    <input type="text" name="prenom"> 
    <input type="submit" value="Valider">
</form>

<?php 
    if(isset($_GET["prenom"])) {
        echo "Vous vous appelez : " . $_GET["prenom"]; 
    }
?>



               

</body>
</html>