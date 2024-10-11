<?php

    function renderMenuToHtml($currentPageId, $langue) {
        $myMenu = array(
            'accueil' => array('Accueil'),
            'cv' => array('Cv'),
            'hobbies' => array('Hobbies'),
            'infos-techniques' =>array('Infos Techniques'),
            'contact' => array('Contact')
        );
        echo("<nav class=\"menu\">");
        echo("<ul>");
        foreach ($myMenu as $pageId => $pageParameters ) {
            echo("<li class=\"choixDeMenu\"");
            if($pageId === $currentPageId){
                echo("id=\"selected\"");
            }
            echo("><a class=\"notUnderlined\" href=\"index.php?page=$pageId&lang=$langue\">$pageParameters[0]</a></li>");
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