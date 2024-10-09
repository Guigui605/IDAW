<?php

    function renderMenuToHtml($currentPageId) {
        $myMenu = array(
            'index' => array('Accueil'),
            'cv' => array('Cv'),
            'hobbies' => array('Hobbies'),
            'infos-techniques' =>array('Infos Techniques')
        );
        echo("<nav class=\"menu\">");
        echo("<ul>");
        foreach ($myMenu as $pageId => $pageParameters ) {
            echo("<li class=\"choixDeMenu\"");
            if($pageId === $currentPageId){
                echo("id=\"selected\"");
            }
            echo("><a class=\"notUnderlined\" href=\"$pageId.php\">$pageParameters[0]</a></li>");
        }
        echo("</ul>");
        echo("</nav>");
    }

?>