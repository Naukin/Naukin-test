<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <title>Contacts</title>
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
                    <a class="nav-link" href="admin.php">Вернуться</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h1 align="center" class="mb-5">Таблица заявок</h1>
<table class="table" id="allPosts" width="100%" align="center">
    <thead>
    <tr>
        <th scope="col-4">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Емайл</th>
        <th scope="col">Категория</th>
        <th scope="col">Text</th>
    </tr>
    </thead>
    <tbody>

    <?php
    require ('conectionAndFunctions.php');
    $contacts = getContacts();
    $contacts = array_reverse($contacts);
    foreach ($contacts as $contact) {
        echo '<tr>';
        echo '<th align="center"> ' . $contact["id"] . '</th>';
        echo '<td align="center">' . $contact["name"] . '</td>';
        echo '<td align="center">' . $contact["email"] . '</td>';
        echo '<td align="center">' . $contact["category"] . '</td>';
        echo '<td align="center">' . $contact["message"] . '</td>';
    }
    ?>
    </tbody>
</table>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>