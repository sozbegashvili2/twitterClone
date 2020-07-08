<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
class MainPageController
{
    public function renderMain(Router $router, Request $request)
    {
        return $router->renderView('index');
    }

    public function renderLogin(Router $router, Request $request)
    {
        return $router->renderContent('login');
    }

    public function renderRegister(Router $router, Request $request)
    {
        return $router->renderContent('sign_up');
    }

    public function verify(Router $router, Request $request)
    {
        $data = $request->getBody();
        if ($data) {
            if ($data['verified']) {
                return $router->renderContent('verification');
            }
        }
    }

    public function sendEmail($body, $subject, $data)
    {
        $mail = new PHPMailer(true);
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
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags($body);
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function signup(Router $router, Request $request)
    {
        $data = $request->getBody();
        $vkey = $router->database->addUser($data);
        if ($vkey) {
            $body = "<a href='http://localhost:8080/verify?vkey={$vkey}'>Verify Your Account</a>";
            MainPageController::sendEmail($body, 'E-mail verification', $data);
            header('Location:/verification?verified=no');
        }
    }

    public function login(Router $router, Request $request)
    {
        $data = $request->getBody();
        $check = $router->database->checkUser($data);
        if (!$check) {
            header("location:/");
        } else {
            return $router->renderContent('login', ['msg' => $check]);
        }
    }

    public function verification(Router $router, Request $request)
    {
        $data = $request->getBody();
        if ($data) {
            if ($data['vkey']) {
                $router->database->verifyUser($data['vkey']);
                return $router->renderContent('verify');
            }
        }
    }

    public function recoverPass(Router $router, Request $request)
    {
        return $router->renderContent('password_reset');
    }

    public function postRecover(Router $router, Request $request)
    {
        $data = $request->getBody();
        $result = $router->database->checkEmail($data);
        if (sizeof($result) > 0) {
            $body = "<a href='localhost:8080/reset_form?token={$result[0]['token']}'>Reset Password</a>";
            MainPageController::sendEmail($body, 'Reset Password', $data);
            $msg = "Email was sent";
            return $router->renderContent('password_reset', ['msg' => $msg]);
        } else {
            $msg = "No user found with that email";
            return $router->renderContent('password_reset', ['msg' => $msg]);
        }
    }

    public function renderReset(Router $router, Request $request)
    {
        $data = $request->getBody();
        if ($data) {
            if (isset($data['token'])) {
                $result = $router->database->checkQuery($data['token'], 'token');
                if (intval($result['cnt']) > 0) {
                    return $router->renderContent('reset_form',['token' => $data['token']]);
                }
                else
                {
                    return "404";
                }
            }
            else
            {
                return "404";
            }
        }
        else
        {
            return "404";
        }
    }

    public function resetPass(Router $router, Request $request){
        $data = $request->getBody();
        $router->database->changePass($data['token'],$data['password']);
        header('Location:/login');
    }
}