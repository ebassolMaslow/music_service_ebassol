<?php
$connect = mysqli_connect('localhost', 'root', '', 'music_service');
mysqli_set_charset($connect, 'utf8');
setlocale(LC_ALL, "UTF-8");

if (!$connect) {
    printf("Невозможно подключиться к базе данных. Код ошибки: 1", mysqli_connect_error());
    exit;
}
