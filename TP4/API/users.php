<?php
    require_once("init_pdo.php");
    function get_users($db){
        $sql = "SELECT * FROM USER";
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
        $reponse = $db->query($requete);
        if(!$reponse){
            http_response_code(422);
            exit(-1);
        }
        else{
            $requete = $db->query("SELECT FROM `users` WHERE `email`='".$email."'");
        
        }
        
        http_response_code(201);
    }
    // ==============
    // Responses
    // ==============
    switch($_SERVER["REQUEST_METHOD"]) {
        case 'GET':
            $result = get_users($pdo);
            setHeaders();
            exit(json_encode($result));
        case 'POST':
            // https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
            if(isset($_POST['name']) && isset($_POST['email'])){
                create_user($pdo,$_POST['name'],$_POST['email']);
            }
            else{
                http_response_code(400);
                exit(-1);
            }

            
            http_response_code(501);
            exit(-1);
    }

