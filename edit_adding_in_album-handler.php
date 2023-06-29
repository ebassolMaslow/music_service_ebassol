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
      } 
      else {
        $_SESSION['message'] = 'Доступ есть только у админов!';
        header("location: ./index.php");
      }

if(isset($_GET['idA'])) {
    $ADT = $_GET['idA'];
}

if (isset($_POST['albums'])) {
    $favorite = $_POST['albums'];
    if ($favorite === '') {
        unset($favorite);
    }
}

if (isset($_POST['track'])) {
    $track = $_POST['track'];
    if ($track === '') {
        unset($track);
    }
}

$favorite = trim($_POST['albums']);
$track = trim($_POST['track']);

$queryTrack = "UPDATE `adding_in_album` SET `ID_albums` = '$favorite', `ID_track` = '$track' WHERE `ID_adding_in_album` = '$ADT'";
addslashes($queryTrack);
$resCreateTrack = mysqli_query($connect, $queryTrack) or die(mysqli_error($connect));

header("location: ./adding_in_album-panel.php");
?>

