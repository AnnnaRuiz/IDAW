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

    $request = $pdo->prepare("SELECT * FROM users");
    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_OBJ);

    echo '<h1>Users</h1>';

    if ($result) {
        echo '<table border="1">';
        echo' <tr>
            <th> Id </th>
            <th> Name </th>
            <th> Email </th>
        </tr>';
        
        foreach ($result as $row) {
            echo '<tr>';
            foreach ($row as $key => $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No results found.";
    }

} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
} 
 // Close the database connection
$pdo = null;

?>
<form action="create.php" method="POST">
        <table>
            <tr>
                <th>Name :</th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>Email :</th>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Add" /></td>
            </tr>
        </table>
</form>