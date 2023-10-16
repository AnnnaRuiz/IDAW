<?php

$modif=false;
if(isset($_POST['modif']) && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])){  
    $modif = $_POST['modif'];
    $identifiant=$_POST['id'];
    $mail=$_POST['email'];
    $nom=$_POST['name'];
}

?>

<!Doctype html>
<html>


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
            <th> Actions </th>
        </tr>';
        
        foreach ($result as $row) {
            echo '<tr>';
            $id=null;
            foreach ($row as $key => $value) {
                echo '<td>' . $value . '</td>';
                if( $key=='id'){
                    $id=$value;
                }
                if( $key=='name'){
                    $name=$value;
                }
                if( $key=='email'){
                    $email=$value;
                }
            }
            echo '
                <form action="users.php" method="POST">
                    <input type="hidden" name="name" value="'.$name.'">
                    <input type="hidden" name="email" value="'.$email.'">
                    <input type="hidden" name="id" value="'.$id.'">
                    <input type="hidden" name="modif" value="true">
                    <td><input type="submit" value="Modify" /></td>
                </form>';
            echo '
                <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="'.$id.'">
                    <td><input type="submit" value="Delete" /></td>
                </form>';
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
<?php if ($modif==true) :?>
    <form action="modify.php" method="POST">
        <table>
            <input type="hidden" name="id" value="<?php echo $identifiant?>">

            <tr>
                <th>Name :</th>
                <td><input type="text" name="name" value="<?php echo $nom?>"></td>
            </tr>
            <tr>
                <th>Email :</th>
                <td><input type="text" name="email" value="<?php echo $mail?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Update" /></td>
            </tr>
        </table>
</form>
<?php endif;?>

</html>

