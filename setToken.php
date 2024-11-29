<?php
include("db.php");

// Kiểm tra trạng thái session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Chỉ xử lý yêu cầu POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method!']);
    exit;
}

// Kiểm tra quyền truy cập
if (empty($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    echo json_encode(['status' => 'error', 'message' => 'Login required!']);
    exit;
}

// Lấy email từ session
$email = $_SESSION['user']['email'];

// Truy vấn để lấy token của người dùng
$sql = "SELECT token FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$tokenUser = $result->fetch_assoc();

if (!$tokenUser) {
    echo json_encode(['status' => 'error', 'message' => 'User not found!']);
    exit;
}

// Kiểm tra token
if ($tokenUser['token'] <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'Insufficient tokens!']);
    exit;
}

// Cập nhật token - giảm đi 1
$newToken = $tokenUser['token'] - 1;
$updateSql = "UPDATE user SET token = ? WHERE email = ?";
$updateStmt = $conn->prepare($updateSql);
$updateStmt->bind_param('is', $newToken, $email);

if ($updateStmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Token updated!', 'newToken' => $newToken]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update token!']);
}

// Đóng kết nối
$stmt->close();
$updateStmt->close();
$conn->close();
?>
