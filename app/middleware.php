<?php
require_once "../app/core/App.php";


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class middleware {
    function checklogin() {
        // Lấy URL hiện tại theo định dạng của Router (Ví dụ: "auth/login", "home/index")
        $current_url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

        // Danh sách các URL được phép truy cập tự do mà không cần đăng nhập
        $publicpages = [
            'home/login',  // Trang hiển thị giao diện đăng nhập
            'auth/login'   // Hàm xử lý logic đăng nhập (BẮT BUỘC PHẢI CÓ)
        ];

        // Nếu CHƯA ĐĂNG NHẬP và trang hiện tại KHÔNG nằm trong danh sách public
        if (!isset($_SESSION['user']) && !in_array($current_url, $publicpages)) {
            header('Location: /home/login');
            exit();
        }
    }
}
?>