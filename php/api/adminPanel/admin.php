<?php
$submitDelete = 'Вы уверены что хотите удалить этот элемент?';
$submitUpdate = 'Вы уверены что хотите изменить этот элемент?';
session_start();
$status = $_SESSION['user']['status'];
if($status !== 'true'){
    header('Location: /php/api/adminPanel/index.html');
    exit();
}
require 'conectionAndFunctions.php';
?>
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
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top:0px; z-index: 10">
   <div class="container">
       <a class="navbar-brand" href="#">Панель админа</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav">
               <li class="nav-item">
                   <a class="nav-link" href="#createPost">Созать пост</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#allPosts">Все посты</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="contacts.php">Контакты</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#">Заявки</a>
               </li>
           </ul>
       </div>
   </div>
</nav>
<div class="row">
    <div class="col-md-7 offset-4">
        <h1 id="createPost">Создать новый пост</h1>
    </div>
</div>
<!--Create Post-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <form action="createPost.php" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" maxlength="50" id="login" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="postName">PostName</label>
                    <input type="text" name="postName" class="form-control" maxlength="50" id="login" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" maxlength="250" id="login" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="postText">Post text</label>
                    <textarea class="form-control" name="postText" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
                <div class="form-group ">
                    <label for="example-date-input" class="col-2 col-form-label">Data</label>
                    <input class="form-control" name="data" type="date" id="example-date-input" required>
                </div>
                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="text" name="image" class="form-control" id="login" aria-describedby="emailHelp" required>
                </div>
                <button type="submit" class="btn btn-block btn-success mb-5">Создать</button>
            </form>
        </div>
    </div>
</div>
<h1 align="center" class="mb-5">Таблица постов</h1>
<table class="table" id="allPosts">
    <thead>
    <tr>
        <th scope="col-4">#</th>
        <th scope="col">Title</th>
        <th scope="col">PostName</th>
        <th scope="col">Description</th>
        <th scope="col">Post text</th>
        <th scope="col">Data</th>
        <th scope="col">Image</th>
        <th scope="col">Image</th>
        <th scope="col">Действия</th>
    </tr>
    </thead>
    <tbody>

<?php
$posts = getAllPosts();
$posts = array_reverse($posts);
foreach ($posts as $post): ?>

    <?php
        echo '<tr>';
        echo '<th scope="row">'.$post["id"].'</th>';
        echo '<td>'.$post["title"].'</td>';
        echo '<td style="max-width: 10px; overflow: hidden">'.$post["postName"].'</td>';
        echo '<td>'.$post["description"].'</td>';
        echo '<td>'.$post["post"].'</td>';
        echo '<td>'.$post["data"].'</td>';
        echo '<td style="max-width: 200px; overflow: hidden">'.$post["image"].'</td>';
    ?>
    <td style="width: 100px"> <img width="100%" src='<?php echo $post["image"]?>' alt="Картинка не может быть загружена!"></td>
    <td>
    <form action="deletePost.php" method="post" onSubmit="return confirm('Вы уверены что хотите удалить этот пост?')">
        <input type="text" name="id" value='<?php echo $post["id"]?>' style="display: none">
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
    <form action="changePost.php" method="post">
        <input type="text" name="id" value='<?php echo $post["id"]?>' style="display: none">
        <button type="submit" class="btn btn-warning mt-3">Изменить</button>
    </form>
    </td>

<?php
    echo '</tr>';
?>
    <?php endforeach; ?>
    </tbody>
</table>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>



