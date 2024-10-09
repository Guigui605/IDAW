<?php require_once('templateHeader.php') ?>
        <h1 class="faireUnTraitEnBas">Guilhem MAIRE - Mes Hobbies</h1>
        
        <?php 
            require_once("menu.php"); 
            renderMenuToHtml("hobbies");
        ?>
        
        <div class="page">
            <p>J'ai beaucoup de hobbies dans ma vie, laissez moi vous en partager quelques unes !</p>
            <div class="contenuDePage">
                <h2>La Musique</h2>
                <p>Je fais beaucoup de musique dans ma vie. Je fais de la guitare, de la basse, du piano, de la batterie, et une petit peu de flûte traversière.</p>
            </div>
            <div class="contenuDePage">
                <h2>Le sport</h2>
                <p>Je fais régulièrement du vélo, et j'aime beaucoup faire du baseball, même si on en trouve pas beaucoup dans la région.</p>
            </div>
            <div class="contenuDePage">
                <h2>Les jeux de société</h2>
                <p>Je trouve ça super sympa de faire des jeux de société de temps en temps (échecs, catane, ou autres ...)</p>
            </div>
        </div>
<?php require_once('templateFooter.php') ?>