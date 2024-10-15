<?php
    require_once('../config.php');
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['action'])){
        $connectionString = "mysql:host=". _MYSQL_HOST;
        if(defined('_MYSQL_PORT'))
            $connectionString .= ";port=". _MYSQL_PORT;
        $connectionString .= ";dbname=" . _MYSQL_DBNAME;
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
        $pdoConnection = NULL;
        try {
            $pdoConnection = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
            $pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $erreur) {
            echo 'Erreur : '.$erreur->getMessage();
        }
        if($_POST['action']==='ajouter'){
            $pdoConnection->beginTransaction();
            $requestPost = $pdoConnection->prepare("INSERT INTO `users` (`name`, `email`) VALUES ('".$_POST['name']."', '".$_POST['email']."')");
            $requestPost->execute();
            $response = $requestPost->fetchAll(PDO::FETCH_ASSOC);
            $pdoConnection->commit();
        }
        else if($_POST['action']==='supprimer' && isset($_POST['id'])){
            $pdoConnection->beginTransaction();
            $requestPost = $pdoConnection->prepare("DELETE FROM `users` WHERE `id`='".$_POST['id']."' AND `name` ='". $_POST['name']."' AND `email` = '".$_POST['email']."'");
            $requestPost->execute();
            $response = $requestPost->fetchAll(PDO::FETCH_ASSOC);
            $pdoConnection->commit();
        }
        else if($_POST['action']==='modifier' && isset($_POST['id'])){
            $pdoConnection->beginTransaction();
            $name = $_POST['name'];
            $email = $_POST['email'];
            $id = $_POST['id']; // Assuming you have an ID field

            $sql = "UPDATE `users` SET `name` = ?, `email` = ? WHERE `id` = ?";
            $requestPost = $pdoConnection->prepare($sql);
            $requestPost->execute([$name, $email, $id]);
            $response = $requestPost->fetchAll(PDO::FETCH_ASSOC);
            $pdoConnection->commit();
        }
    }
    $connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT'))
        $connectionString .= ";port=". _MYSQL_PORT;
    $connectionString .= ";dbname=" . _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
    $pdo = NULL;
    try {
        $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        echo 'Erreur : '.$erreur->getMessage();
    }
    $request = $pdo->prepare("select * from users");
    $request->execute();
    $response = $request->fetchAll(PDO::FETCH_ASSOC);
    afficherReponseEnTableau($response);
    // TODO: add your code here
    // retrieve data from database using fetch(PDO::FETCH_OBJ) and
    // display them in HTML array
    /*** close the database connection ***/
    $pdo = null;

    function afficherReponseEnTableau($response){
        echo("<h1>Users</h1>");
        echo("<table>");
        echo("<tr><td>ID :     </td><td>Name :      </td><td>email :</td></tr>");
        foreach($response as $index => $row){
            echo("<tr>");
            forEach($row as $indexColumn => $value){
                echo("<td>$value</td>");
            }
            echo("</tr>");
        }
        echo("</table>");
    }
?>
<form method='post'>
    <ul>
        <li>
            <label for='id'>ID (A renseigner pour la suppression et la modification)</label>
            <input type='number' name='id'/>
        </li>
        <li>
            <label for='name'>Prénom</label>
            <input type='text' name='name' required/>
        </li>
        <li>
            <label for='name'>Email</label>
            <input type='text' name='email' required/>
            <select name='action'>
                <option value='modifier'>Modifier</option>
                <option value='ajouter'>Ajouter</option>
                <option value='supprimer'>Supprimer</option>
            </select>
        </li>
        <li>
            <input type='submit' value="Effectuer l'action"/>
        </li>    
    </ul>
</form>
    