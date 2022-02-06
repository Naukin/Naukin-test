<?php
require 'conectionAndFunctions.php';
$currentId = $_POST['id'];
if($currentId){
    global $link;
    $sql = "DELETE FROM `blog` WHERE `blog`.`id` = $currentId";
    $query= $link->query($sql);
    if($query) {
        header("Location: /php/api/adminPanel/admin.php");
        exit();
    }
}


