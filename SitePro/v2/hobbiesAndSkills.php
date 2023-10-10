<!DOCTYPE html>
<html lang="fr">

<?php require_once('head.php')?>


<body>
    <div class="container p-0">
        <div class="row bg-dark text-white m-0 p-0" >
            <div class=" col-12 text-center"></br><h2> Mes Compétences et mes hobbies </h2></br></div>
        </div>
    </div> 

  
    <div class="container p-0 ">
        <div class="row align-self-center">
            <div class="col-3 ml-0">
                <?php 
                    require_once('template_menu.php');
                    renderMenuToHTML('hobbiesAndSkills');
                ?>
            </div>

            <div class="col-9 text-justify">
                






            </div>
        </div>
    </div> 

    <?php require_once('template_footer.php')?>

</body>

</html>