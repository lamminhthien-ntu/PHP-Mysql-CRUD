<?php
session_start();
//Hello im testing git in ubuntu
//Hello im testing git in httdocs folder inside /opt/lampp/project folder
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