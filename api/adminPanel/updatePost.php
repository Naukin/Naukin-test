<?php
require "conectionAndFunctions.php";
$id = $_POST["id"];
$title = $_POST["newTitle"];
$postName = $_POST["newPostName"];
$description = $_POST["newDescription"];
$postText = $_POST["newText"];
$date = $_POST["newDate"];
$image = $_POST["newImage"];
updateThisPost($id, $title, $postName, $description, $postText, $date, $image);
header("Location: /php/api/adminPanel/admin.php");
exit();
