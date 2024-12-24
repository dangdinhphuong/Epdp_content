<?php
include("db.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$selectFields = [];
if (isset($_COOKIE['selectField'])) {
    $selectFields = json_decode($_COOKIE['selectField'], true); // Giải mã JSON
    // Sử dụng $selectField ở đây
}

// Biến toàn cục
global $conn;
$presetData = $_SESSION['preset_data'] ?? [];
$selected = '';
$result = $_GET["result"] ?? 0;
$fields = ['tema', 'tajuk', 'kdg', 'cstd', 'op', 'kk', 'apm', 'au', 'apn'];


function getSelectedValue()
{

    global $selected, $fields;
    foreach ($fields as $field) {
        if (!empty($_GET[$field])) {
            $selected = $_GET[$field] ?? '';
            break;
        }
    }

    return $selected; // Trả về giá trị $selected
}

function getData($field)
{
    global $result, $selectFields, $fields, $conn;
    $conditions = [];
    $parameters = [];
    $fieldNew = array_slice($fields, 0, array_search($field, $fields));
    $filteredSelectFields = array_intersect_key($selectFields[$result], array_flip($fieldNew));

    foreach ($filteredSelectFields as $key => $filteredSelectField) {

        $conditions[] = "$key = ?";
        $cleaned_string = str_replace("/n", "", $filteredSelectField);
        $value = preg_replace(['/\\n/', '/\\r/'], ['/n', '/r'], $cleaned_string);
        $parameters[] = $value;
    }

    // Tạo câu SQL
    $sql = "SELECT * FROM preset";
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($sql);


    if (!empty($parameters)) {
        $stmt->bind_param(str_repeat('s', count($parameters)), ...$parameters); // "s" cho kiểu string
    }


    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows ?? [];
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

        $dataAll = getData($field) ?? $presetData;
        // Dữ liệu từ biến toàn cục nếu không phải 'tema'
        foreach ($dataAll as $preset) {
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
