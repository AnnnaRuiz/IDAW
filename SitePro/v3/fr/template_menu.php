
<?php
    function renderMenuToHTML($currentPageId) {
        // un tableau qui définit la structure du site
        $mymenu = array(
            // idPage titre
            'accueil' => array( 'Accueil' ),
            'cv' => array( 'Formation' ),
            'projets' => array('Expériences'),
            'hobbiesAndLanguages' => array('Langues et Hobbies'),
            'skills' => array('Connaissances et compétences')
        );
        
    echo '<nav class="menu">
             <ul>
                <br>';

    foreach($mymenu as $pageId => $pageParameters) {
        echo '<li>';
        if($pageId == $currentPageId ) {
            echo '<a id="currentpage" href="index.php?page='.$pageId.'&lang=fr">'.$pageParameters[0].'</a>';
        
        } else {
            echo '<a href="index.php?page='.$pageId.'&lang=fr">'.$pageParameters[0].'</a>';
        }
        echo '</li>';
    }

    echo '<li><a class="bg-light text-dark" href="index.php?page='.$currentPageId.'&lang=en">ENGLISH</a></li>
        </ul>
        </nav>';
        
    }

