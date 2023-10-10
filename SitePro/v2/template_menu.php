
<?php
    function renderMenuToHTML($currentPageId) {
        // un tableau qui définit la structure du site
        $mymenu = array(
            // idPage titre
            'index' => array( 'Accueil' ),
            'cv' => array( 'Formation' ),
            'projets' => array('Expériences'),
            'hobbiesAndSkills' => array('Compétences'),
            'infos_techniques' => array('Informations')
        );
        
    echo '<nav class="menu">
        <ul>';

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
