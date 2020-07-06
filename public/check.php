<?php
include "../db/Database.php";
$tmpConn = new Database();
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $tmpConn->check($username,'username');
}
elseif (isset($_POST['email'])) {
    $email = $_POST['email'];
    $tmpConn->check($email,'email');
}