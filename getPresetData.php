<?php
include("db.php");

// Kiểm tra xem có dữ liệu POST gửi lên không
$conditions = [];
$parameters = [];

if (!empty($_POST['tajuk'])) {
    $conditions[] = "tajuk = ?";
    $parameters[] = $_POST['tajuk'];
}

if (!empty($_POST['tema'])) {
    $conditions[] = "tema = ?";
    $parameters[] = $_POST['tema'];
}

if (!empty($_POST['kdg'])) {
    $conditions[] = "kdg = ?";
    $parameters[] = $_POST['kdg'];
}

if (!empty($_POST['cstd'])) {
    $conditions[] = "cstd = ?";
    $parameters[] = $_POST['cstd'];
}

if (!empty($_POST['op'])) {
    $conditions[] = "op = ?";
    $parameters[] = $_POST['op'];
}

if (!empty($_POST['kk'])) {
    $conditions[] = "kk = ?";
    $parameters[] = $_POST['kk'];
}

if (!empty($_POST['apm'])) {
    $conditions[] = "apm = ?";
    $parameters[] = $_POST['apm'];
}

if (!empty($_POST['au'])) {
    $conditions[] = "au = ?";
    $parameters[] = $_POST['au'];
}

if (!empty($_POST['apn'])) {
    $conditions[] = "apn = ?";
    $parameters[] = $_POST['apn'];
}

// Nếu có bất kỳ điều kiện nào, thêm điều kiện vào truy vấn
$sql = "SELECT * FROM preset";
if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}
var_dump($sql,$parameters);die;
// Sử dụng prepared statement để tránh SQL Injection
$stmt = $conn->prepare($sql);

// Bind các tham số cho prepared statement
if (count($parameters) > 0) {
    $stmt->bind_param(str_repeat('s', count($parameters)), ...$parameters); // "s" là kiểu dữ liệu string
}

// Thực thi câu lệnh
$stmt->execute();
$result = $stmt->get_result();

// Lấy tất cả các bản ghi từ query và trả về JSON
$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

// Kiểm tra xem có kết quả hay không
if (count($rows) > 0) {
    echo json_encode($rows); // Trả về tất cả các bản ghi dưới dạng JSON
} else {
    echo json_encode(["error" => "No data found"]);
}

// Đóng statement
$stmt->close();

// Đóng kết nối
$conn->close();
?>
