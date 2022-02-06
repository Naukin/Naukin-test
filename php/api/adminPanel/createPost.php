<?php
require 'conectionAndFunctions.php';

$title = $_POST["title"];
$postName = $_POST["postName"];
$description= $_POST["description"];
$postText = $_POST["postText"];
$data = $_POST["data"];
$image = $_POST["image"];

global $link;
$sql = "INSERT INTO `blog` (`postName`, `title`, `image`, `description`, `post`, `data`) VALUES ('$postName', '$title', '$image', '$description', '$postText', '$data')";
$query= $link->query($sql);
if($query) {
    header("Location: /php/api/adminPanel/admin.php");
    exit();
}

