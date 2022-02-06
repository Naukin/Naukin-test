<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Admin Panel</title>
</head>
<body>

<div class="container" align="center">
   <div class="row">
       <div class="col-md-6" align="left">

           <h1 align="center">Выбранный пост</h1>
           <?php
           require 'conectionAndFunctions.php';
           $currentId = $_POST['id'];

           $currentPost = getPost($currentId);
           foreach ($currentPost as $cp){
               echo "<img src='".$cp["image"]."' width='45%'><br>";
               echo "<b>title: </b>".$cp["title"]."<br>";
               echo "<b>post Name: </b>".$cp["postName"]."<br>";
               echo "<b>Description: </b>".$cp["description"]."<br>";
               echo "<b>Post text: </b>".$cp["post"]."<br>";
               echo "<b>Data: </b>".$cp["data"]."<br>";
               echo "<b>Image: </b>".$cp["image"]."<br>";
           }

           ?>
       <a href="admin.php" class="btn btn-block btn-dark mb-5" style="margin-top: 50px">Вернуться</a>
       </div>
       <div class="col-md-6" align="left">
           <h1>Поля для редактирования</h1>
           <form action="updatePost.php" method="post" onSubmit="return confirm('Вы уверены что хотите отредактировать этот пост?')">
               <input type="text" name="id" class="form-control mb-3" value='<?php echo $currentId?>' style="display:none;">

               <p>Title</p>
               <input type="text" name="newTitle" maxlength="50" class="form-control mb-3" value='<?php echo $currentPost[0]["title"]?>'>
               <br>
               <p>postName</p>
               <input type="text" name="newPostName" maxlength="50" class="form-control mb-3" value='<?php echo $currentPost[0]["postName"]?>'>
               <br>
               <p>description</p>
               <input type="text" name="newDescription" maxlength="250" class="form-control mb-3" value='<?php echo $currentPost[0]["description"]?>'>
               <br>
               <p>postText</p>
               <textarea class="form-control" name="newText" rows="7"><?php echo $currentPost[0]["post"]?></textarea>
               <br>
               <p>date</p>
               <input class="form-control mb-3" name="newDate" name="data" type="date" value='<?php echo $currentPost[0]["data"]?>'>
               <br>
               <p>image</p>
               <input type="text" name="newImage" class="form-control mb-3" value='<?php echo $currentPost[0]["image"]?>'>

               <button type="submit" class="btn btn-block btn-warning mb-5 mt-3">Изменить</button>
           </form>
       </div>
   </div>

</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
