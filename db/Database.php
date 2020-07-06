<?php
class Database
{
public $pdo;

public function __construct()
{
 $servername = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'twitterclone';
 $this->pdo = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
}

public function addUser($data) {
    if ($data['gender'] == 'female') {
        $userImg = 'images/download.jpg';
    }
    else {
        $userImg = 'images/male-profile-picture-vector-1862205.jpg';
    }
    $coverImg = 'images/cover.jpg';
    $hashedpass = password_hash($data['psswd'],PASSWORD_BCRYPT);
    $vkey = md5(time().$data['username']);
    $verified = 0;
    $statement = $this->pdo->prepare("INSERT INTO users(fullName,userName,email,password,country,gender,bday,user_image,user_cover,hash,verified)
    VALUES (:fullname,:username,:email,:password,:country,:gender,:bday,:user_image,:user_cover,:hash,:verified)");
    $statement->bindParam(':fullname',$data['full_name']);
    $statement->bindParam(':username',$data['username']);
    $statement->bindParam(':email',$data['email']);
    $statement->bindParam(':password',$hashedpass);
    $statement->bindParam(':country',$data['location']);
    $statement->bindParam(':gender',$data['gender']);
    $statement->bindParam(':bday',$data['Birthdate']);
    $statement->bindParam(':user_image',$userImg);
    $statement->bindParam(':user_cover',$coverImg);
    $statement->bindParam(':hash',$vkey);
    $statement->bindParam(':verified',$verified);
    $statement->execute();
}

public function check($info,$search) {
    $query = "select count(*) as cnt from users where $search ='".$info."'";
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    $result = $statement->fetch();
    $count = $result['cnt'];
    $response = "<span id='response' style='color: green;'>Available.</span>";
    if ($count > 0) {
        $response = "<span id='response' style='color: red;'>Not Available.</span>";
    }
    echo $response;
}

}