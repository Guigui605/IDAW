<?php require_once('templateHeader.php') ?>
        <h1 class="faireUnTraitEnBas">Bienvenue dans mon site</h1>
        
        <?php 
            require_once("menu.php");
            renderMenuToHtml("index");
        ?>
        
        <p>Si vous souhaitez me découvrir, n'hésitez pas à clique sur un des liens ci-dessus !</p>
        
<?php require_once('templateFooter.php') ?>