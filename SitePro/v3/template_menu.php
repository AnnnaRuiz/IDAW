
<?php
    function renderMenuToHTML($currentPageId, $lang) {
        // un tableau qui définit la structure du site
        $mymenu = array(
            // idPage titre
            'accueil' => array( 'fr'=>'Accueil', 'en'=>'Home page'),
            'cv' => array( 'fr'=>'Formation', 'en'=>'Education' ),
            'projets' => array('fr'=> 'Expériences professionnelles', 'en'=>'Professional Experience'),
            'associatif'=>array('fr'=>'Experiences Associatives','en'=>'Personal Experience'),
            'hobbiesAndLanguages' => array('fr'=>'Langues et Hobbies','en'=>'Languages & Hobbies'),
            'skills' => array('fr'=>'Connaissances et compétences','en'=>'Skills and qualifications')
        );
        
    echo '<nav class="menu">
             <ul>
                <br>';

    foreach($mymenu as $pageId => $pageParameters) {
        echo '<li>';
        if($pageId == $currentPageId ) {
            echo '<a id="currentpage" href="index.php?page='.$pageId.'&lang='.$lang.'">'.$pageParameters[$lang].'</a>';
        
        } else {
            echo '<a href="index.php?page='.$pageId.'&lang='.$lang.'">'.$pageParameters[$lang].'</a>';
        }
        echo '</li>';
    }
    if($lang=='fr'){
        echo '<li><a class="bg-light text-dark" href="index.php?page='.$currentPageId.'&lang=en">ENGLISH</a></li>'; 
    }else{
        echo '<li><a class="bg-light text-dark" href="index.php?page='.$currentPageId.'&lang=fr">FRANCAIS</a></li>';
    }
    
    echo '</ul> </nav>';
        
    }

