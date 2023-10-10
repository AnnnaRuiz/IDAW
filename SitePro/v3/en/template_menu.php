
<?php
    function renderMenuToHTML($currentPageId) {
        // un tableau qui définit la structure du site
        $mymenu = array(
            // idPage titre
            'accueil' => array( 'Home page' ),
            'cv' => array( 'Education' ),
            'projets' => array('Professional Experience'),
            'associatif'=> array('Personal Experience'),
            'hobbiesAndLanguages' => array('Languages & Hobbies'),
            'skills' => array('Skills and qualifications')
        );
        
    echo '<nav class="menu">
             <ul>
                <br>';

    foreach($mymenu as $pageId => $pageParameters) {
        echo '<li>';
        if($pageId == $currentPageId ) {
            echo '<a id="currentpage" href="index.php?page='.$pageId.'&lang=en">'.$pageParameters[0].'</a>';
        
        } else {
            echo '<a href="index.php?page='.$pageId.'&lang=en">'.$pageParameters[0].'</a>';
        }
        echo '</li>';
    }

    echo '<li><a class="bg-light text-dark" href="index.php?page='.$currentPageId.'&lang=fr">FRANCAIS</a></li>
        </ul>
        </nav>';
        
    }

