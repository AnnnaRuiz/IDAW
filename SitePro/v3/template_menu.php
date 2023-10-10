
<?php
    function renderMenuToHTML($currentPageId) {
        // un tableau qui définit la structure du site
        $mymenu = array(
            // idPage titre
            'index' => array( 'Accueil' ),
            'cv' => array( 'Formation' ),
            'projets' => array('Expériences'),
            'hobbiesAndLanguages' => array('Langues et Hobbies'),
            'skills' => array('Connaissances et compétences')
        );
        
    echo '<nav class="menu">
             <ul>
                <div class="row-2"></br><h4> Menu :</h4></div>';

    foreach($mymenu as $pageId => $pageParameters) {
        echo '<li>';
        if($pageId == $currentPageId) {
            echo '<a id="currentpage" href="'.$pageId.'.php">'.$pageParameters[0].'</a>';
        } else {
            echo '<a href="'.$pageId.'.php">'.$pageParameters[0].'</a>';
        }
        echo '</li>';
    }

    echo '</ul>
        </nav>';
        
    }
?>
