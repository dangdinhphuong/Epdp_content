<?php
// Bắt đầu session nếu chưa bắt đầu
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Xóa tất cả dữ liệu trong session
$_SESSION = [];

// Hủy session
session_destroy();

// Xóa toàn bộ cookie
if (!empty($_COOKIE)) {
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, '', time() - 3600, '/'); // Đặt thời gian hết hạn là quá khứ
        unset($_COOKIE[$key]); // Xóa khỏi mảng $_COOKIE
    }
}

// Chuyển hướng về trang login hoặc trang chủ
header("Location: login.php");
exit();
?>
