<?php
    require_once("templateHeader.php");
    require_once("menu.php");
    $currentPageId = 'accueil';
    $lang = 'fr';
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
    if(isset($_GET['lang'])) {
        $lang = $_GET['lang'];
    }
?>
<header class="bandeau_haut">
    <h1 class="titre">Guilhem Maire</h1>
</header>
<?php
    renderMenuToHTML($currentPageId, $lang);
?>
<section class="corps">
<?php
    $pageToInclude = $lang . '/' . $currentPageId . ".php";
    if(is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once("error.php");
?>
</section>
<?php 
    require_once("templateFooter.php");
?>