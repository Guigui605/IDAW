<?php
    require_once("init_pdo.php");
    function get_users($db){
        $sql = "SELECT * FROM `users` ORDER BY `id`";
        $exe = $db->query($sql);
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    function setHeaders() {
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
        header("Access-Control-Allow-Origin: *");
        header('Content-type: application/json; charset=utf-8');
    }

    function create_user($db, $name, $email){
        $requete = "INSERT INTO `users` (`name`, `email`) VALUES ('".$name."', '".$email."')";
        try{
            $reponse = $db->query($requete);
        }
        catch(e){
            http_response_code(208);
            setHeaders();
            exit(json_encode("The email already exists in the dataBase. Try to modify the user instead."));
        }
        
        $requete = $db->query("SELECT * FROM `users` WHERE `email`='".$email."'");
        $res = $requete->fetchAll(PDO::FETCH_OBJ);
        http_response_code(201);
        return $res;
        
    }

    function modify_user($db, $name, $email, $id){
        $requete = "UPDATE `users` SET `name`='$name',`email`='$email' WHERE `id`='$id'";
        $reponse = $db->query($requete);
        if(!$reponse){
            http_response_code(422);
            setHeaders();
            exit(json_encode("Could not modify user. Please check your arguments."));
        }
        else{
            $requete = $db->query("SELECT * FROM `users` WHERE `email`='".$email."'");
            $res = $requete->fetchAll(PDO::FETCH_OBJ);
            http_response_code(201);
            return $res;
        }
    }

    function getInfoById($db,$id){
        $req = "SELECT * FROM `users` WHERE `id`=".$id;
        $requete = $db->query($req);
        $res = $requete->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    function getInfoByEmail($db,$email){
        $requete = $db->query("SELECT * FROM `users` WHERE `email`='$email'");
        $res = $requete->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    function getInfoByName($db, $name){
        $requete = $db->query("SELECT * FROM `users` ORDER BY `id` WHERE `name`='$name'");
        $res = $requete->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    function delete_user($db, $id){
        $user = getInfoById($db, $id);
        print_r($user);
        $requete = $db->query("DELETE FROM `users` WHERE `id`='$id'");
        return "The user : ".$user->name." with email : ".$user->email." has been deleted";
    }

    function verifParametres($tableau){
        foreach($tableau as $index=>$valeur){
            foreach($valeur as $index=>$character){
                if($character === '<' || $character ==='>'){
                    http_response_code(403);
                    setHeaders();
                    exit(json_encode("Cannot contain '<' or '>'"));
                }
            }
        }
    }
    // ==============
    // Responses
    // ==============
    switch($_SERVER["REQUEST_METHOD"]) {
        case 'GET':
            //verifParametres($_GET);
            if(isset($_GET['id'])){
                $result = getInfoById($pdo, $_GET['id']);
                setHeaders();
                exit(json_encode($result));
            }
            else if(isset($_GET['email'])) {
                $result = getInfoByEmail($pdo, $_GET['email']);
                setHeaders();
                exit(json_encode($result));
            }
            else if(isset($_GET['name'])) {
                $result = getInfoByName($pdo, $_GET['name']);
                setHeaders();
                exit(json_encode($result));
            }
            else{
                $result = get_users($pdo);
                setHeaders();
                exit(json_encode($result));
            }
        case 'POST':
            //verifParametres($_POST);
            // https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
            $parameters = json_decode(file_get_contents('php://input'),true);
            if(isset($parameters['name'])&&isset($parameters['email'])){
                $result = create_user($pdo,$parameters['name'],$parameters['email']);
                setHeaders();
                exit(json_encode($result));
            }
            else{
                http_response_code(400);
                setHeaders();
                exit(json_encode("Missing argument to create new entry in database. POST :",print_r($parameters)));
            }
        case 'PUT':
            $parameters = json_decode(file_get_contents('php://input'),true);
            if(!isset($parameters['id'])){
                http_response_code(400);
                exit(json_encode("Tried to modify without ID."));
            }
            if(!isset($parameters['email'])){
                $parameters['email']= getInfoById($pdo, $parameters['id'])->email;
            }
            if(!isset($parameters['name'])){
                $parameters['name']= getInfoById($pdo, $parameters['id'])->name;
            }
            $result = modify_user($pdo, $parameters['name'], $parameters['email'], $parameters['id']);
            setHeaders();
            exit(json_encode($result));
        case 'DELETE':
            $parameters = json_decode(file_get_contents('php://input'),true);
            if(!isset($parameters['id'])){
                http_response_code(400);
                setHeaders();
                exit(json_encode("Tried to delete without giving an ID."));
            }
            else{
                $result = delete_user($pdo, $parameters['id']);
                setHeaders();
                exit(json_encode($result));
            }
        default:
            http_response_code(501);
            exit(-1);
    }