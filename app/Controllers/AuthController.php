<?php

class AuthController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Here you would typically check the credentials against a database
            if ($username === 'admin' && $password === 'password') {
                $_SESSION['user'] = $username;
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                $error = 'Invalid username or password';
                require_once VIEWS_PATH . 'login.php';
            }
        } else {
            require_once VIEWS_PATH . 'login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }
}