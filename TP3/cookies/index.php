<?php  
    $style='style1';
    if(isset($_COOKIE['style'])){
        $style=$_COOKIE['style'];
    }
    if(isset($_GET['css'])){  
        $style = $_GET['css'];
        setcookie("style", $style, time()+3600);
    } 
?>

<!DOCTYPE html>
<html>

    <head>
        <link href="<?php echo $style?>.css" rel="stylesheet"> 
    </head>

    <body>
        <form id="style_form" action="index.php" method="GET">
            <select name="css">
                <option value="style1" <?php if ($style=="style1")?>>style1</option>
                <option value="style2">style2</option>
            </select>
            <input type="submit" value="Appliquer" />
        </form>
        <h1> Bienvenue sur cette page</h1>

    </body>
</html>