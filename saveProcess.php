<?php
include("db.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method!']);
    exit;
}

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data!']);
    exit;
}

try {
    // Bắt đầu transaction thủ công
    $conn->begin_transaction();
    echo '<pre>';

    foreach ($data as $period_id => $period) {
        foreach ($period as $key => $records) {
            $flattenedArray = flattenArray($records);
            $flattenedArray = removeDuplicates($flattenedArray);
            
            // Kiểm tra xem period_id đã tồn tại chưa
            $checkSql = "SELECT COUNT(*) FROM process WHERE period_id = ?";
            $stmtCheck = $conn->prepare($checkSql);
            $stmtCheck->bind_param("i", $key);
            $stmtCheck->execute();
            $stmtCheck->bind_result($exists);
            $stmtCheck->fetch();
            $stmtCheck->close();
           
            if ($exists > 0) {
                // Update nếu tồn tại
                $updateSql = "UPDATE process SET 
                    sub = ?, tema = ?, tajuk = ?, kdg = ?, cstd = ?, op = ?, kk = ?, apm = ?, au = ?, apn = ?, refleksi = ?, 
                    emk = ?, nilai = ?, abm = ?, kb = ?, peta = ?, pbd = ?, tahap = ?, akt21 = ?, p21 = ?, praujian = ?, pascaujian = ?, 
                    6k = ?, aspirasi = ?, inputRefleksi = ?, tsm = ?, nameRefleksi = ? 
                    WHERE period_id = ?";

                // Loại bỏ "penggal" và "minggu" khỏi mảng flattenedArray
                $flattenedArray = array_slice($flattenedArray, 0, -2); // Loại bỏ 2 phần tử cuối (penggal, minggu)
                $flattenedArray[] = $key; // Thêm period_id vào cuối mảng

                // Xác định kiểu dữ liệu cho mỗi tham số trong bind_param
                $types = str_repeat("s", count($flattenedArray) - 1) . "i"; // Các tham số là chuỗi (s), và period_id là int (i)

                $stmtUpdate = $conn->prepare($updateSql);
                $stmtUpdate->bind_param($types, ...$flattenedArray); // Truyền các giá trị vào
                $stmtUpdate->execute();
                $stmtUpdate->close();
            } else {
                array_unshift($flattenedArray, $key); // Thêm period_id vào đầu mảng
               
                // Insert nếu không tồn tại
                $insertSql = "INSERT INTO process (
                    period_id, sub, tema, tajuk, kdg, cstd, op, kk, apm, au, apn, refleksi, 
                    emk, nilai, abm, kb, peta, pbd, tahap, akt21, p21, praujian, pascaujian, 
                    6k, aspirasi, inputRefleksi, tsm, nameRefleksi, penggal, minggu
                ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                    ?, ?, ?, ?, ?, ?, ?
                )";

                $stmtInsert = $conn->prepare($insertSql);
                $stmtInsert->bind_param(str_repeat("s", count($flattenedArray)), ...$flattenedArray);
                $stmtInsert->execute();
                $stmtInsert->close();

            }
        }
    }

    $conn->commit(); // Xác nhận transaction
    echo json_encode(['status' => 'success', 'message' => 'Data processed successfully!']);
} catch (mysqli_sql_exception $e) {
    $conn->rollback(); // Hoàn tác nếu có lỗi
    
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage() . $e->getLine()]);
}

function flattenArray($array)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
           
            $array[$key] = reset($value);
            if (is_array($array[$key])) {
                $array[$key] = json_encode($array[$key]);
               
            }
        }
    }
    return $array;
}

function removeDuplicates($array) {
    $cleanedArray = [];

    foreach ($array as $value) {
        if (strpos($value, "\n") !== false) {
            // Tách chuỗi thành các dòng
            $lines = explode("\n", $value);

            // Loại bỏ dòng trùng lặp
            $uniqueLines = array_unique($lines);

            // Gộp lại thành chuỗi
            $cleanedArray[] = implode("\n", $uniqueLines);
        } else {
            $cleanedArray[] = $value;
        }
    }
            
    return $cleanedArray;
}


?>
