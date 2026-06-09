<?php
require_once "../app/core/App.php";

if (session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }
    class middleware {
        function checklogin() {
            $cur_url = isset($_GET['url']) ? rtrim($_GET['url'],'/') : '';
            $publicpages = [
                'home/login',
                'auth/login'
            ];
            if (!isset($_SESSION['user'])&&!in_array($cur_url,$publicpages)) {
                header('Location: /home/login');
                exit();
            }
        }
    }
?>