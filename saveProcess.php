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

// Lấy dữ liệu JSON từ yêu cầu
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true); // Giải mã JSON thành mảng PHP

if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data!']);
    exit;
}

// Chuẩn bị câu lệnh SQL
$sql = "INSERT INTO process (
            period_id, sub, tema, tajuk, kdg, cstd, op, kk, apm, au, apn, refleksi, 
            emk, nilai, abm, kb, peta, pbd, tahap, akt21, p21, praujian, pascaujian, 
            6k, aspirasi, inputRefleksi,tsm
        ) VALUES (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
            ?, ?, ?,?
        )";

$stmt = $conn->prepare($sql);

// Duyệt qua từng phần tử dữ liệu
try {
    foreach ($data as $period_id => $period) {
        foreach ($period as $period_id => $records) {

            $flattenedArray = flattenArray($records);
            array_unshift($flattenedArray, $period_id);
            $stmt->execute($flattenedArray);
        }
    }

    echo json_encode(['status' => 'success', 'message' => 'Data saved successfully!']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

function flattenArray($array)
{

    // Duyệt qua mảng và thay thế các phần tử mảng bằng giá trị của chúng
    foreach ($array as $key => $value) {
        if (is_array($value)) {

            // Nếu phần tử là mảng, lấy giá trị đầu tiên (chỉ có một phần tử trong mảng)
            $array[$key] = reset($value);
            if (is_array($array[$key])) {
                $array[$key] = json_encode($array[$key]);;
            }

        }
    }
    return $array;
}

?>
