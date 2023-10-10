
<?php

    function renderMenuToHTML($currentPageId) {
        // un tableau qui définit la structure du site
        $mymenu = array(
            // idPage titre
            'index' => array( 'Accueil' ),
            'cv' => array( 'Formation' ),
            'projets' => array('Expériences')
            'hobbiesAndSkills' => array('Compétences')
            'infos_techniques' => array('Informations')
        );
        // ...
        foreach($mymenu as $pageId => $pageParameters) {
            if($pageId==$currentPageId){
                echo "<li><a id="currentpage" href="" . $pageId . ".php">" . $pageParameters ."Formation</a></li>;"
            }
            else{
                echo "<li><a href="" . $pageId . ".php">" . $pageParameters ."Formation</a></li>;"
            }
            
        }
        // ...
    }
?>

<nav>
    <ul>
        <div class="row-2"></br><h4> Menu :</h4></div>
        <div class="row-10">
            <?php renderMenuToHTML($currentPageId)?>
        </div>
    </ul> 
</nav>