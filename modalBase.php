<?php
include("db.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Biến toàn cục
global $conn;
$presetData = $_SESSION['preset_data'] ?? [];
$selected = '';
function getSelectedValue()
{
    $fields = ['tajuk', 'tema', 'kdg', 'cstd', 'op', 'kk', 'apm', 'au', 'apn'];
    global $selected;
    foreach ($fields as $field) {
        if (!empty($_GET[$field])) {
            $selected = $_GET[$field] ?? '';
            break;
        }
    }

    return $selected; // Trả về giá trị $selected
}

function renderInputForm($field, $type = 'radio')
{
    global $conn, $presetData, $selected; // Sử dụng biến toàn cục
    getSelectedValue();
    echo "<form id='" . htmlspecialchars($field) . "' method='POST'>";

    // Truy vấn dữ liệu nếu trường là 'tema'
    $data = [];
    if ($field === 'tema') {
        $sql = "SELECT `$field` FROM `preset` GROUP BY `$field`";
        $result = $conn->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row[$field];
            }
        } else {
            echo "Lỗi truy vấn: " . htmlspecialchars($conn->error);
            return;
        }
    } else {
        // Dữ liệu từ biến toàn cục nếu không phải 'tema'
        foreach ($presetData as $preset) {
            $data[] = $preset[$field] ?? '';
        }
    }

    // Loại bỏ các phần tử trùng lặp trong mảng
    $data = array_unique($data);

    // Hiển thị các radio button
    foreach ($data as $value) {
        if (!empty($value)) {

            $value = preg_replace(['/\/n/', '/\/r/'], ["\n", "\r"], $value);
            $normalized = preg_replace('/\s+/', ' ', str_replace(['<br>', '<br/>'], '', $selected));
            $escapedValue = preg_replace('/\s+/', ' ', htmlspecialchars($value, ENT_QUOTES));
            $isChecked = $normalized == $escapedValue ? 'checked' : ''; // Kiểm tra và gán 'checked' nếu đúng

            $html = "<input style='margin:20px 0 0 20px; float: left;' type='" . $type . "' name='" . htmlspecialchars($field) . "' value='" . nl2br(htmlspecialchars($value, ENT_QUOTES)) . "' $isChecked>";
            $html .= "<span style='margin-left: 20px; float: left;'>" . nl2br(htmlspecialchars($value, ENT_QUOTES)) . "</span><br style='clear: both;'><br>";
            echo $html;
        }
    }


    echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
    echo "</form>";
}

?>
