<?php
require "functions.php";

header('Access-control-Allow-Origin: *');
header('Access-control-Allow-Headers: *');
header('Access-control-Allow-Methods: *');
header('Access-control-Allow-Credentials: true');

header('Content-type: application/json; charset=utf-8');

//header("Refresh:2, url=http://naukin.com");        //перебрасывает на страцицу (фикс ошибки с формой)

$method = $_SERVER['REQUEST_METHOD'];


$type = $_GET['type'];
$params = $_GET['params'];

if(isset($params)){
    $postName = $params;
}

switch ($method) {
    case 'GET':
        if($type === 'posts'){
            if(isset($postName)){     //если указано имя поста
                $post = getBlogPost($postName);
            }
            else{               //если не указано имя поста
                $posts = getBlogPosts();
            }
        }
        else if($type === "contacts"){
            http_response_code(405);
            $res = [
                "status"=>false,
                "message"=>"method not allowed"
            ];
            echo json_encode($res);
        }
        else if($type === "postswithout"){
            if(isset($postName)){     //если указано имя поста
                $postWithOut = getBlogPostWithOutPostName($postName);
            }

        }
        break;
    case 'POST':
        if($type === 'contacts')
        {
           $response = addContact($_POST);
           header("Refresh:0, url=http://naukin.com");
        }
        else{
            http_response_code(405);
            $res = [
                "status"=>false,
                "message"=>"method not allowed"
            ];
            echo json_encode($res);
        }
        break;
}

