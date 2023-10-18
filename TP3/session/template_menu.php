
<?php
    function renderMenuToHTML($currentPageId) {
        // un tableau qui définit la structure du site
        $mymenu = array(
            // idPage titre
            'accueil' => array( 'Home' ),
            'latin' => array( 'Latin' ),
        );
        
    echo '<nav class="menu">
             <ul>';

    foreach($mymenu as $pageId => $pageParameters) {
        echo '<li>';

        echo '<a href="index.php?page='.$pageId.'">'.$pageParameters[0].'</a>';
        
        echo '</li>';
    }

    echo '</ul>
        </nav>';
        
    }

