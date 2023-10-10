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
                    <br><h2>Languages</h2><br>
                </div>
                <div class="row-8">
                    <p><h5>French</h5> Native language</p>

                    <p><h5>English</h5>European level C1 - TOIEC 950 </p>
                    
                    <p><h5>Espagnol</h5>European level B2</p>

                    <p><h5>Coréen</h5> Certified level 3</p>
                </div>

            </div>

            <div class="col-4 text-justify">
                <div class="row-3 text-center">
                    <br><h2>Personal interests</h2><br>
                </div>
                <div class="row-9">
                    <h5><i class="fas fa-plane" style="color: #000000;"></i> Travel</h5>
                    <p>France, Italy, Spain, United Kingdom, Korea, Hungary</p>
                    <br>
                    <h5><i class="fas fa-swimmer" style="color: #000000;"></i> Sport</h5>
                    <p>Rythmic gymnastic  (during 11 years), running, bike riding,swimming, indoor climbing</p>
                    <br>
                    <h5><i class="fas fa-palette" style="color: #000000;"></i> Drawing and painting</h5>
                    <img height="100px" src="drawing.png" alt="portrait dessiné à partir d'un modèle">
                    <br>
                </div>
            </div>      
        </div>
    </div> 

    <?php require_once('template_footer.php')?>

</body>

</html>