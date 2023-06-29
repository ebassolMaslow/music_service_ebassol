<?php

session_start();
include "./php_connect/connect.php";

if (isset($_SESSION['ID_users'])) {
    $IDuser = $_SESSION['ID_users'];
    if ($IDuser === '') {
        unset($IDuser);
    }
}
if (isset($IDuser)) {
    $query_access = "SELECT * FROM users, role WHERE ID_users = '$IDuser' AND users.ID_role = role.iD_role";
    addslashes($query_access);
    $res_access = mysqli_query($connect, $query_access);
    $row_access = mysqli_fetch_object($res_access);
    $roles = $row_access->name_role;
} else {
    $_SESSION['message'] = 'Доступ есть только у админов!';
    header("location: ./index.php");
}

if(isset($_GET['idA'])) {
    $user = $_GET['idA'];
}

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login === '') {
        unset($login);
    }
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if ($email === '') {
        unset($email);
    }
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password === '') {
        unset($password);
    }
}

$login = trim($_POST['login']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
    
$queryUser = "UPDATE `users` SET `login` = '$login', `email` = '$email', `password` = '$password' WHERE `ID_users` = '$user'";
addslashes($queryUser);
$resUser = mysqli_query($connect, $queryUser) or die(mysqli_error($connect));
header("location: ./users-panel.php");


?>
