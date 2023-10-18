
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">  
</head>
<body>

<?php
    session_start();

    if(isset($_GET['deconnexion'])) {
        session_unset();
        session_destroy();
        unset($_GET['deconnexion']);
    }

    $login = "Anonymous";
    $is_connected = False;

    if(isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
        $is_connected = True;
    }

    if(isset($_POST['login'])) {
        $login = $_POST['login'];
        $_SESSION['login'] = $login;
        $is_connected = True;
    }

    $currentPageId = 'accueil';

    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    } 

    require_once("template_menu.php");
?>

<?php
    if(isset($_SESSION['login'])){
        echo "<h1>Bienvenu ".$login."</h1>";
        renderMenuToHTML($currentPageId);
        $pageToInclude = $currentPageId . ".php";
        if(is_readable($pageToInclude)){
            require_once($pageToInclude);
        }   
        else{
            require_once("error.php");
        }
    } else {
        
    }
    
?>
<?php if (!$is_connected): ?>
    <form id="login_form" action="connected.php" method="POST">
        <table>
            <tr>
                <th>Login :</th>
                <td><input type="text" name="login"></td>
            </tr>
            <tr>
                <th>Mot de passe :</th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Se connecter..." /></td>
            </tr>
        </table>
    </form>

	<?php else: ?>

		<div>
			<a href="index.php?deconnexion">Logout</a>
		</div>

	<?php endif ?>


</body>
</html>
    

