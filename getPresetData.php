<?php
include("db.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    return 'login required !';
}
// Mảng chứa điều kiện và tham số
$conditions = [];
$parameters = [];

// Danh sách các cột cần kiểm tra
$fields = ['tajuk', 'tema', 'kdg', 'cstd', 'op', 'kk', 'apm', 'au', 'apn'];

foreach ($fields as $field) {
    if (!empty($_POST[$field])) {
        $conditions[] = "$field = ?";
        $parameters[] = str_replace('/n', "\r\n", $_POST[$field]);
    }
}

// Tạo câu SQL
$sql = "SELECT * FROM preset";
if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

// Sử dụng prepared statement để tránh SQL Injection
$stmt = $conn->prepare($sql);

// Bind các tham số vào prepared statement
if (!empty($parameters)) {
    $stmt->bind_param(str_repeat('s', count($parameters)), ...$parameters); // "s" cho kiểu string
}

// Thực thi câu lệnh
$stmt->execute();
$result = $stmt->get_result();

// Lấy dữ liệu và trả về JSON
$rows = $result->fetch_all(MYSQLI_ASSOC);

if (!empty($rows)) {
    echo json_encode($rows);
} else {
    echo json_encode(["error" => "No data found"]);
}

// Đóng statement và kết nối
$stmt->close();
$conn->close();
?>
