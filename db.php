<?php
session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql_crud'
);

if (isset($conn)) {
    echo 'DB connected successfully';
}
else echo 'Please check username and password, sever ip or database name';