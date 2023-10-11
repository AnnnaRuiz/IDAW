<!DOCTYPE html>
<html>
<?php

   $currentPageId = 'accueil';
   $lang='fr';

   if(isset($_GET['page'])) {
      $currentPageId = $_GET['page'];
   } 
   
   if(isset($_GET['lang'])) {
      $lang = $_GET['lang'];
   } 
   require_once("head.php");
   require_once("template_menu.php");
?>
<body>


<?php
   $pageToInclude = $lang."/".$currentPageId . ".php";
   if(is_readable($pageToInclude)){
      require_once($pageToInclude);
   }   
   else{
      require_once("error.php");
   }
?>

<?php
   require_once($lang."/template_footer.php");
?>
</body>
</html>