<?php
class ProfileController
{
    public function renderProfile(Router $router,Request $request) {
        if(!isset($_SESSION['userName'])) {
            header('Location:/login');
        }
        else
        {
            echo "USER PROFILE";
        }
    }
}