<?php
$my_host = 'localhost';
$username = 'db_user';
$password = 'db_user';
$database = 'naukin';

try{
    $link = new PDO('mysql:host='.$my_host.';dbname='.$database, $username, $password);
    $link->exec("SEET NAMES UTF8");
}catch(Exception $e){
    die("Не удалось подключиться". $e->getMessage());
}

function getAllPosts(){
    global $link;
    $sql = "SELECT * FROM `blog`";
    $query= $link->query($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}
function getPost($id){
    global $link;
    $sql = "SELECT * FROM `blog` WHERE id = $id";
    $query= $link->query($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}
function updateThisPost($id, $title, $postName, $newDescription, $postText, $date, $image){
    global $link;
    if($id && $title && $postName && $newDescription && $postText && $date && $image){
        $sql = "UPDATE `blog` SET `postName` = :postName, `title` = :title, `image` = :image, `description` = :newDescription, `post` = :text, `data` = :newData WHERE `blog`.`id` = '$id'";
        $query= $link->prepare($sql);
        $params = [
            "postName"=> $postName,
            "title"=>$title,
            "image"=>$image,
            "newDescription"=>$newDescription,
            "text"=>$postText,
            "newData"=>$date
        ];
        $query->execute($params);
    }
}

function getContacts(){
    global $link;
    $sql = "SELECT * FROM `contacts`";
    $query= $link->query($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}