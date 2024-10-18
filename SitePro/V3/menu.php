<?php

    function renderMenuToHtml($currentPageId, $langue) {
        $myMenu = array(
            'accueil' => array('Accueil', 'Home Page'),
            'cv' => array('Cv', 'Cv'),
            'hobbies' => array('Hobbies', 'Hobbies'),
            'infos-techniques' =>array('Infos Techniques', 'Technical Informations'),
            'contact' => array('Contact', 'Contact'),
            'jscrud' => array('Jscrud', 'Jscrud')
        );
        echo("<nav class=\"menu\">");
        echo("<ul>");
        foreach ($myMenu as $pageId => $pageParameters ) {
            echo("<li class=\"choixDeMenu\"");
            if($pageId === $currentPageId){
                echo("id=\"selected\"");
            }
            if($langue === 'fr'){
                echo("><a class=\"notUnderlined\" href=\"index.php?page=$pageId&lang=$langue\">$pageParameters[0]</a></li>");
            }
            else if($langue === 'en'){
                echo("><a class=\"notUnderlined\" href=\"index.php?page=$pageId&lang=$langue\">$pageParameters[1]</a></li>");
            }
        }
        if($langue === 'fr'){
            echo("<li class=\"choixDeMenu\"><a class=\"notUnderlined\" href=\"index.php?page=$currentPageId&lang=en\">fr/en</a></li>");
        }
        else {
            echo("<li class=\"choixDeMenu\"><a class=\"notUnderlined\" href=\"index.php?page=$currentPageId&lang=fr\">fr/en</a></li>");
        }
        echo("</ul>");
        echo("</nav>");
        
    }

?>