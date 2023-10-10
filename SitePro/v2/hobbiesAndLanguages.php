<!DOCTYPE html>
<html lang="fr">

<?php require_once('head.php')?>


<body>
    <div class="container p-0">
        <div class="row bg-dark text-white m-0 p-0" >
            <div class=" col-12 text-center"></br><h2> Langues et Centres d'intérêt  </h2></br></div>
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
                    <h2><br>Langues</h2><br>
                </div>
                <div class="row-9">
                    <p><h5>Anglais</h5> : Niveau C1 - TOIEC 950 </p>
                    
                    <p><h5>Espagnol</h5> : Niveau B2</p>

                    <p><h5>Coréen</h5> : Intermédiaire certifiée</p>

                    <p><h5>Japonais</h5> : Notions</p>
                </div>

            </div>

            <div class="col-4 text-justify">
                <div class="row-3 text-center">
                    <h2><br>Centres d'intérêt</h2><br>
                </div>
                <div class="row-9">
                    <h4>Voyager</h4>
                    <p>France, Italie, Espagne, Angleterre, Corée, Hongrie</p>
                    <br>
                    <h4>Sport</h4>
                    <p>Gymnastiuqe rythmique (pendant 11 ans), running, vélo, natation, escalade</p>
                    <br>
                    <h4>Dessin et Peture</h4>
                    <br>
                </div>
            </div>      
        </div>
    </div> 

    <?php require_once('template_footer.php')?>

</body>

</html>