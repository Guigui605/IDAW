<?php require_once('templateHeader.php') ?>

<h1 class="faireUnTraitEnBas">Guilhem MAIRE - CV</h1>

<?php 
    require_once("menu.php");
    renderMenuToHtml("cv");
?>

<div class="CV">
    <h1 class="faireUnTraitEnBas">Guilhem MAIRE</h1>
    <h2>Etudiant à IMT Nord Europe</h2>
    <div class="contenuDePage">
        <h3>Formations</h3>
        <p>Bac maths physique au lycée Notre Dame "les oiseaux"<br>Ecole d'ingénieurs IMT Nord Europe</p>
    </div>
    <div class="contenuDePage">
        <h3>Expériences</h3>
        <p>Stage automatisation de processus chez CHEMDOC Water Technologies<br>Stage test informatique chez Stellantis<br>Stage opérateur de ligne chez Stellantis</p>
    </div>
    <div class="contenuDePage">
        <h3>Compétences</h3>
        <p>Langages informatiques : C, python, javascript, java, <s>html</s>(c'est faux)<br>Langues : Anglais (965 au TOEIC), <s>Allemand</s></p>
    </div>
</div>

<?php require_once('templateFooter.php') ?>