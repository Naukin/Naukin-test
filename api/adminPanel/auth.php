<?php
session_start();

$login = $_POST['login'];
$password = $_POST['password'];

if($login === "NaukinAdminPanel"){
    if($password == "s2hX3ZEgmzrUn2uJTNGr69hHu4HpJRQy8MCCKeN2"){
        $_SESSION['user']=[
            "status"=>'true',
        ];
        header('Location: /php/api/adminPanel/admin.php');
        exit();
    }
    else{
        $_SESSION['user']=[
            "status"=>'false',
        ];
        header('Location: /php/api/adminPanel/index.html');
        exit();
    }
}
else
{
    $_SESSION['user']=[
        "status"=>'false',
    ];
    header('Location: /php/api/adminPanel/index.html');
    exit();
}
