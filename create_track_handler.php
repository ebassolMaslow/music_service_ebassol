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

if (isset($_POST['track_name'])) {
    $trackname = $_POST['track_name'];
    if ($trackname === '') {
        unset($trackname);
    }
}

if (isset($_POST['musician'])) {
    $IDmusician = $_POST['musician'];
    if ($IDmusician === '') {
        unset($IDmusician);
    }
}

if (isset($_POST['Number_of_auditions'])) {
    $Numberofauditions = $_POST['Number_of_auditions'];
    if ($Numberofauditions === '') {
        unset($Numberofauditions);
    }
}

if (isset($_POST['year_of_release'])) {
    $yearofrelease = $_POST['year_of_release'];
    if ($yearofrelease === '') {
        unset($yearofrelease);
    }
}

if (isset($_POST['genre'])) {
    $IDgenre = $_POST['genre'];
    if ($IDgenre === '') {
        unset($IDgenre);
    }
}

$trackname = trim($_POST['track_name']);
$IDmusician = trim($_POST['musician']);
$Numberofauditions = trim($_POST['Number_of_auditions']);
$yearofrelease = trim($_POST['year_of_release']);
$IDgenre = trim($_POST['genre']);

$qCreateTrack = "INSERT INTO track (`track_name`,`ID_musician`,`Number_of_auditions`,`year_of_release`,`ID_genre`) VALUES ('$trackname','$IDmusician','$Numberofauditions','$yearofrelease','$IDgenre')";
addslashes($qCreateTrack);
$resCreateTrack = mysqli_query($connect, $qCreateTrack) or die(mysqli_error($connect));

header("location: ./track-panel.php");
