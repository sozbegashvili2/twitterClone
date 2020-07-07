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
    return $vkey;
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

public function checkUser($data){
    $statement = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
    $statement->bindParam(':email',$data['email']);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
     if (sizeof($result) > 0) {
         $password = $data['password'];
         if(password_verify($data['password'],$result[0]['password']) && $result[0]['verified'] == 1) {
             $_SESSION[$result[0]['userName']] = $result[0];
             return false;
         }
         else
         {
             $msg = 'Password is incorrect or account is not verified';
             return $msg;
         }
     }
     else
     {
         $msg = "User with such email doesn't exist";
         return $msg;
     }
}
public function verifyUser($vkey) {
   $stm = $this->pdo->prepare("UPDATE users SET verified = 1 WHERE hash = :hash ");
    $stm->bindValue(':hash',$vkey);
    $stm->execute();
}
}