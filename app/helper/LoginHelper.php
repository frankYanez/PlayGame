<?php

class LoginHelper {
    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        LoginHelper::init();
        $_SESSION['USER_USER'] = $user->user; 
    }

    public static function logout() {
        LoginHelper::init();
        session_destroy();
    }

    public static function verify() {
        LoginHelper::init();
        if (!isset($_SESSION['USER_USER'])) {
            header('Location: ' . BASE_URL . '/login');
            die();
        }
    }







}