<!DOCTYPE html>
<html lang="fr">

<?php require_once('head.php')?>


<body>
    <div class="container p-0">
        <div class="row bg-dark text-white m-0 p-0" >
            <div class=" col-12 text-center"></br><h2><i class="fas fa-globe-europe" style="color: #ffffff;"></i> Langues et Centres d'intérêt  </h2></br></div>
        </div>
    </div> 

  
    <div class="container p-0 ">
        <div class="row align-self-center">
            <div class="col-3 ml-0">
                <?php 
                    require_once('template_menu.php');
                    renderMenuToHTML('hobbiesAndLanguages');
                ?>
            </div>

            <div class="col-4 text-justify">
                <div class="row-4 text-center">
                    <br><h2>Langues</h2><br>
                </div>
                <div class="row-8">
                    <p><h5>Anglais</h5> Niveau C1 - TOIEC 950 </p>
                    
                    <p><h5>Espagnol</h5> Niveau B2</p>

                    <p><h5>Coréen</h5> Intermédiaire certifiée</p>

                    <p><h5>Japonais</h5> Notions</p>
                </div>

            </div>

            <div class="col-4 text-justify">
                <div class="row-3 text-center">
                    <br><h2>Centres d'intérêt</h2><br>
                </div>
                <div class="row-9">
                    <h5><i class="fas fa-plane" style="color: #000000;"></i> Voyager</h5>
                    <p>France, Italie, Espagne, Angleterre, Corée, Hongrie</p>
                    <br>
                    <h5><i class="fas fa-swimmer" style="color: #000000;"></i> Sport</h5>
                    <p>Gymnastique rythmique (pendant 11 ans), running, vélo, natation, escalade</p>
                    <br>
                    <h5><i class="fas fa-palette" style="color: #000000;"></i> Dessin et Peinture</h5>
                    <img height="100px" src="drawing.png" alt="portrait dessiné à partir d'un modèle">
                    <br>
                </div>
            </div>      
        </div>
    </div> 

    <?php require_once('template_footer.php')?>

</body>

</html>