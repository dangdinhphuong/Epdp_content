<?php
include("db.php");

$sub = $_GET["sub"];
$sql = "SELECT  * FROM `preset`";
$result = $conn->query($sql);

$splitData = [];

while ($row = $result->fetch_assoc()) {
    // Tách các dòng trong kdg và cstd
    $kdgLines = explode("\n", $row['kdg']);
    $cstdLines = explode("\n", $row['cstd']);

    // Lưu các dòng cstd theo nhóm kdg
    $mappedCstd = [];
    foreach ($cstdLines as $cstdLine) {
        // Lấy phần đầu để xác định nhóm, ví dụ: 2.1 từ 2.1.1
        preg_match('/^(\d+\.\d+)/', trim($cstdLine), $matches);
        if (isset($matches[1])) {
            $key = $matches[1]; // Key là 2.1, 2.2,...
            $mappedCstd[$key][] = $cstdLine;
        }
    }

    // Tạo mảng mới từ kdg và các cstd tương ứng
    foreach ($kdgLines as $kdgLine) {
        $newRow = $row;

        // Lấy phần đầu của kdg để ánh xạ
        preg_match('/^(\d+\.\d+)/', trim($kdgLine), $matches);
        $kdgKey = $matches[1] ?? null;

        if ($kdgKey) {
            $newRow['kdg'] = $kdgLine;

            // Gán các dòng cstd tương ứng
            $newRow['cstd'] = isset($mappedCstd[$kdgKey])
                ? implode("\r\n", array_map('trim', $mappedCstd[$kdgKey]))
                : null;
            unset($newRow["id"]);
            // Thêm vào kết quả
            $splitData[] = $newRow;

        }
    }
}




// Chuẩn bị câu lệnh SQL chèn dữ liệu
$insertSql = "INSERT INTO config (subject, tema, tajuk, kdg, cstd, op, kk, apm, au, apn, period)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Sử dụng prepared statements để bảo mật
$stmt = $conn->prepare($insertSql);

if (!$stmt) {
    die("Lỗi chuẩn bị câu lệnh: " . $conn->error);
}

foreach ($splitData as $dataRow) {
    // Gán giá trị cho từng trường, thay NULL bằng chuỗi rỗng nếu cần
    $subject = $dataRow['subject'] ?? "";
    $tema = $dataRow['tema'] ?? "";
    $tajuk = $dataRow['tajuk'] ?? "";
    $kdg = $dataRow['kdg'] ?? "";
    $cstd = $dataRow['cstd'] ?? ""; // Thay NULL bằng ""
    $op = $dataRow['op'] ?? "";
    $kk = $dataRow['kk'] ?? "";
    $apm = $dataRow['apm'] ?? "";
    $au = $dataRow['au'] ?? "";
    $apn = $dataRow['apn'] ?? "";
    $period = $dataRow['period'] ?? null;

    $stmt->bind_param(
        "ssssssssssi",
        $subject, $tema, $tajuk, $kdg, $cstd, $op, $kk, $apm, $au, $apn, $period
    );

    if (!$stmt->execute()) {
        echo "Lỗi chèn dữ liệu: " . $stmt->error;
    }
}

// Đóng statement
$stmt->close();

// Thông báo thành công
echo "Dữ liệu đã được chèn thành công.";

?>
