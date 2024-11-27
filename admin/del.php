<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || $_SESSION['user']['role'] != 2) {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$domain = $protocol . "://" . $_SERVER['HTTP_HOST'];
$newPath = strstr($_SERVER['SCRIPT_NAME'], '/admin', true); // Cắt chuỗi từ đầu đến trước "admin"
// Chuyển hướng đến login.php
header("Location: $domain$newPath/login.php");
}
    include('../db.php');
    $id = $_GET["id"];
    //print_r($_GET);

    $sql = "DELETE FROM `user` WHERE id = '$id'";

    if($conn->query($sql)===TRUE){
        header("Location:user.php");
    }else{
        echo '<script>alert("Failed to delete")</script>';
        echo $conn->error;
    }

?>