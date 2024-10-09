<?php require_once('templateHeader.php') ?>
        <h1>Heure</h1>
        <p>Il est actuellement : </p>
        <?php
        function recupHeure(){
            date_default_timezone_set("Europe/Paris");
            $heure = date("G : i : s",time());
            return $heure;
        }
        
        echo(recupHeure());

        ?>
    </body>
</html>