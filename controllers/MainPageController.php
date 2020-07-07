<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
class MainPageController
{
    public function renderMain(Router $router,Request $request) {
        return $router->renderView('index');
    }
    public function renderLogin(Router $router,Request $request) {
        return $router->renderContent('login');
    }
    public function renderRegister(Router $router,Request $request) {
        return $router->renderContent('sign_up');
    }
    public function verify(Router $router,Request $request) {
        $data = $request->getBody();
        if($data){
            if($data['verified']) {
                return $router->renderContent('verification');
            }
        }
    }
    public function signup(Router $router,Request $request) {
         $data = $request->getBody();
        $vkey = $router->database->addUser($data);
        $mail = new PHPMailer(true);
        if($vkey) {
            try {
                //Server settings

                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                $mail->Username = '68e598921a35a8';                     // SMTP username
                $mail->Password = 'af50ce955bc7e7';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('admin@techpower.com', 'TechPower');
                $mail->addAddress($data['email'], 'Joe User');
                $body = "<a href='http://localhost:8080/verify?vkey={$vkey}'>Verify Your Account</a>";
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'E-mail Verification';
                $mail->Body = $body;
                $mail->AltBody = strip_tags($body);
                $mail->send();
                header('Location:/verification?verified=no');
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
}
    public function login(Router $router,Request $request) {
         $data = $request->getBody();
        $check = $router->database->checkUser($data);
    if(!$check) {
        header("location:/");
    }
    else
    {
            return $router->renderContent('login',['msg' => $check]);
    }
    }
    public function verification(Router $router,Request $request) {
        $data = $request->getBody();
        if ($data) {
            if ($data['vkey']) {
               $router->database->verifyUser($data['vkey']);
                return $router->renderContent('verify');
            }
        }
    }
}