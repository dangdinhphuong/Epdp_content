<?php 

$conn = new mysqli("localhost", "root", "", "js-project");


// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Đặt mã hóa UTF-8 cho kết nối
$conn->set_charset("utf8mb4");

function checkEmail($conn, $email){
    $sql = "SELECT * from user WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result->num_rows;
}

function checkSubject($conn, $subject, $id = null){
    if(!empty($id)){
        $sql = "SELECT * from subjects WHERE name = '$subject' and id != $id";
    }else{
        $sql = "SELECT * from subjects WHERE name = '$subject'";
    }
    $result = $conn->query($sql);
    return $result->num_rows;
}

function checkEmailName($conn, $email, $name){
    $sql1 = "SELECT * from user WHERE email = '$email' AND `username` = '$name'";
    $result = $conn->query($sql1);
    return $result->num_rows;
}
?>
