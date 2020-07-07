<?php
include "../db/Database.php";
$tmpConn = new Database();
if(isset($_POST['username'])){
    $username = filter_var($_POST['username'],FILTER_SANITIZE_SPECIAL_CHARS);
    $tmpConn->check($username,'username');
}
elseif (isset($_POST['email'])) {
    $email = filter_var($_POST['email'],FILTER_SANITIZE_SPECIAL_CHARS);
    $tmpConn->check($email,'email');
}
$tmpConn = null;