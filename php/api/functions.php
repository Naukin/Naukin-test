<?php
require "config.php";

function getBlogPosts(){
    global $link;
    $sql="SELECT * FROM `blog`";
    $query = $link->query($sql);
    $tempData = $query->fetchAll();
    $data = null;
    foreach ($tempData as $tmp){
        $data[] = [
            "id"=>$tmp['id'],
            "image"=>$tmp['image'],
            "postName"=>$tmp['postName'],
            "title"=>$tmp['title'],
            "description"=>$tmp['description'],
            "post"=>$tmp['post'],
            "data"=>$tmp['data']
        ];
    }
    echo json_encode($data,JSON_UNESCAPED_UNICODE );   //делаю массив в json с поддержкой русского
}
function getBlogPost($postName){

    $tempArray = explode("-", $postName);
    $curentPostName = implode(" ", $tempArray);

    global $link;
    $sql="SELECT * FROM `blog` WHERE postName = '$curentPostName'";
    $query = $link->query($sql);
    $tempData = $query->fetchAll();
    $data = null;
    foreach ($tempData as $tmp){
        $data[] = [
            "id"=>$tmp['id'],
            "image"=>$tmp['image'],
            "postName"=>$tmp['postName'],
            "title"=>$tmp['title'],
            "description"=>$tmp['description'],
            "post"=>$tmp['post'],
            "data"=>$tmp['data']
        ];
    }
    if($data){
        http_response_code(200);
        echo json_encode($data,JSON_UNESCAPED_UNICODE );   //делаю массив в json с поддержкой русского
    }
    else {
        http_response_code(404);
        $res = [        //делаем ответ сервера при дообавлении
            "status"=>false,
            "message"=>"not found id"
        ];
        echo json_encode($res);
    }
}
function getBlogPostWithOutPostName($postName){

    $tempArray = explode("-", $postName);
    $curentPostName = implode(" ", $tempArray);

    global $link;
    $sql="SELECT * FROM `blog` WHERE postName != '$curentPostName'";
    $query = $link->query($sql);
    $tempData = $query->fetchAll();
    $data = null;
    foreach ($tempData as $tmp){
        $data[] = [
            "id"=>$tmp['id'],
            "image"=>$tmp['image'],
            "postName"=>$tmp['postName'],
            "title"=>$tmp['title'],
            "description"=>$tmp['description'],
            "post"=>$tmp['post'],
            "data"=>$tmp['data']
        ];
    }
    if($data){
        http_response_code(200);
        echo json_encode($data,JSON_UNESCAPED_UNICODE );   //делаю массив в json с поддержкой русского
    }
    else {
        http_response_code(404);
        $res = [        //делаем ответ сервера при дообавлении
            "status"=>false,
            "message"=>"not found id"
        ];
        echo json_encode($res);
    }
}
function addContact ($data){
    global $link;
    $name = $data['name'];
    $email = $data['email'];
    $category = $data['category'];
    $message = $data['message'];

    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $category = htmlspecialchars($category);
    $message = htmlspecialchars($message);



    $stms = $link->prepare("INSERT INTO `contacts` (`name`, `email`, `category`, `message`) 
VALUES (:tmpName, :email, :category, :message);");
    $stms->bindParam(':tmpName',$name);
    $stms->bindParam(':email',$email);
    $stms->bindParam(':category',$category);
    $stms->bindParam(':message',$message);
    $query= $stms->execute();
    if($query){
        http_response_code(201);    //возвращаем код 201-создано
        $res = [        //делаем ответ сервера при дообавлении
            "status"=>true,
            //"post_id"=>$link->lastInsertId(),
            "message"=>"SUCCESS"
        ];
    }
    else {
        http_response_code(501); //не реализовано
        $res = [        //делаем ответ сервера при ошибке
            "status"=>false
        ];
    }


    echo json_encode($res);
}