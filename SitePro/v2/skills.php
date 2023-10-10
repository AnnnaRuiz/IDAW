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

            <div class="col-4 text-justify">
                <div class="row-3 text-center">
                    <h2><br>Langages infomatiques</h2><br>
                </div>
                <div class="row-9">
                    <p>Java </p>
                    <p>Python</p>
                    <p>C</p>
                    <p>HTML</p>
                    <p>CSS (Bootstrap)</p>
                    <p>PHP</p>
                </div>
            </div>   
            
            <div class="col-4 text-justify">
                <div class="row-3 text-center">
                    <h2><br>Soft Skills</h2><br>
                </div>
                <div class="row-9">
                    <p>Polyvalence </p>
                    <p>Rigueur</p>
                    <p>Curiosité</p>
                    <p>Autonomie</p>
                    <p>Persévérance</p>
                </div>
            </div>
        </div>
    </div> 

    <?php require_once('template_footer.php')?>

</body>

</html>