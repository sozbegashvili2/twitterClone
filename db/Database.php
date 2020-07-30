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
    $token = md5(time().$data['email']);
    $verified = 0;
    $statement = $this->pdo->prepare("INSERT INTO users(fullName,userName,email,password,country,gender,bday,user_image,user_cover,hash,verified,token)
    VALUES (:fullname,:username,:email,:password,:country,:gender,:bday,:user_image,:user_cover,:hash,:verified,:token)");
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
    $statement->bindParam(':token',$token);
    $statement->execute();
    return $vkey;
}
public function checkQuery($info,$search){
    $query = "select count(*) as cnt from users where $search ='".$info."'";
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}
public function check($info,$search) {
    $result = $this->checkQuery($info,$search);
    $count = $result['cnt'];
    $response = "<span id='response' style='color: green;'>Available.</span>";
    if ($count > 0) {
        $response = "<span id='response' style='color: red;'>Not Available.</span>";
    }
    echo $response;
}
public function checkEmail($data) {
    $statement = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
    $statement->bindParam(':email',$data['email']);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
public function checkUser($data){
        $result = $this->checkEmail($data);
     if (sizeof($result) > 0) {
         $password = $data['password'];
         if(password_verify($data['password'],$result[0]['password']) && $result[0]['verified'] == 1) {
             $_SESSION['userName'] = $result[0];
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
public function changePass($token,$password){
    echo '<pre>';
    var_dump($token,$password);
    echo '</pre>';
    try {
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $newtoken = md5(time().rand(100,10000));
        $hashPassword = password_hash($password,PASSWORD_BCRYPT);
        $query = "UPDATE users SET password = :password,token = :token WHERE token = :tkn";
        $stm = $this->pdo->prepare($query);
        $stm->bindValue(':password',$hashPassword);
        $stm->bindValue(':token',$newtoken);
        $stm->bindValue(':tkn',$token);
        $stm->execute();
    } catch (PDOException $e) {
    echo $e->getMessage();
    }
}
}