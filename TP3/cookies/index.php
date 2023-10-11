<!DOCTYPE html>
<html>

<head>
    <?php
        $style='style1';
        if(isset($_COOKIE['style'])){
            $style=$_COOKIE['style'];
            echo '<link href="'.$style.'.css" rel="stylesheet"> ';
        }
    ?>
</head>

<body>
    <form id="style_form" action="index.php" method="GET">
        <select name="css">
            <option value="style1">style1</option>
            <option value="style2">style2</option>
        </select>
        <input type="submit" value="Appliquer puis recharger la page" />
    </form>
    <?php
        if(isset($_GET['css'])){
            $content = $_GET['css'];
            setcookie("style", $content, time()+3600);
        }
    ?>
    <h1> Bienvenue sur cette page</h1>

</body>
</html>