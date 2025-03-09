
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
// Lấy dữ liệu từ POST
$day = $_POST['day'];
$date = $_POST['date'];
$id = (int)$_COOKIE["id"] ?? 1;
// Câu lệnh SQL để cập nhật status
$sqlUpdate = "UPDATE `period`
              SET `status` = 1,`date` = '$date'
              WHERE userId = '$id' AND `day` = '$day' AND `status` = 0";

// Thực thi câu lệnh cập nhật
if ($conn->query($sqlUpdate) === TRUE) {
    echo json_encode(['status' => 'success', 'message' => 'Cập nhật thành công!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Lỗi khi cập nhật: ' . $conn->error]);
}
?>
