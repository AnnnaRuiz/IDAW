
<!DOCTYPE html>
<html>
<body>

<?php


    $login='anonymous';
    $currentPageId = 'connected';

    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    } 
    require_once('login.php');
    require_once("template_menu.php");
?>

<?php
    if(isset($_SESSION[$login])){
        echo "<h1>Bienvenu ".$login."</h1>";
        renderMenuToHTML('connected');
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

</body>
</html>
    

