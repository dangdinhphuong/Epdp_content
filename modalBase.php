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
       // $cleaned_string = str_replace("/n", "", $filteredSelectField);
        $value = preg_replace(['/\\n/', '/\\r/'], ['/n', '/r'], $filteredSelectField);
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

    global $conn, $presetData, $selected, $selectFields , $result; // Sử dụng biến toàn cục
    getSelectedValue();

    echo "<form id='" . htmlspecialchars($field) . "' method='POST'>";
    $data = [];
    $dataKdg = [];

    $dataAll = ($field !== 'tema') ? getData($field) : null;


    if (!empty($dataAll)) {
        foreach ($dataAll as $preset) {
            $data[] = $preset[$field] ?? '';
        }
    }
    else {
        $sql = "SELECT `$field` FROM `preset` GROUP BY `$field`";
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row[$field];
            }
        } else {
            echo "Lỗi truy vấn: " . htmlspecialchars($conn->error);
            return;
        }
    }

    // Loại bỏ các phần tử trùng lặp trong mảng

    if (!empty($selectFields[$_GET["result"] ?? 0]["kdg"])) {
        $dataKdg = extractTwoNumbers($selectFields[$_GET["result"] ?? 0]["kdg"]);
    }

    if ($field == 'cstd' && !empty($dataKdg)) {

        // Hiển thị các radio button
        $parts = []; // Khởi tạo mảng rỗng
        foreach ($data as $value) {
            $parts = array_merge($parts, explode('/n', $value)); // Gộp kết quả vào $parts
        }

        $data = filterDataByPrefix($parts, $dataKdg);


    }
    $data = array_unique($data);

    // Hiển thị các radio button
    foreach ($data as $value) {
        if (!empty($value)) {
            $parts = explode('/n', $value);
            foreach ($parts as $part) {
                $part = trim($part); // Loại bỏ khoảng trắng thừa

                // Chuẩn hóa dữ liệu so sánh
                $escapedValue = preg_replace('/\s+/', ' ', htmlspecialchars($part, ENT_QUOTES));
                $normalized = isset($selected) ? preg_replace('/\s+/', ' ', str_replace(['<br>', '<br/>'], '', htmlspecialchars($selected, ENT_QUOTES))) : '';

                $isChecked = $normalized === $escapedValue ? 'checked' : '';

                // Tránh gọi nl2br nhiều lần
                $displayText = nl2br(htmlspecialchars($part, ENT_QUOTES));
                $html = "<input style='margin:20px 0 0 20px; float: left;' type='" . htmlspecialchars($type) . "' name='" . htmlspecialchars($field) . "' value='$displayText' $isChecked>";
                $html .= "<span style='margin-left: 20px; float: left;'>$displayText</span><br style='clear: both;'><br>";
                echo $html;
            }
        }
    }

    echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
    echo "</form>";
}
function extractTwoNumbers(string $text): array {
    preg_match_all('/\d+\.\d+/', $text, $matches);
    return array_unique($matches[0]) ; // Lấy tối đa 2 phần tử đầu tiên
}

function filterDataByPrefix(array $data, array $prefixes): array {
    return array_filter($data, function ($item) use ($prefixes) {
        // Lấy số đầu tiên (dạng x.y) trong chuỗi
        if (preg_match('/^\d+\.\d+/', $item, $match)) {
            return in_array($match[0], $prefixes); // Kiểm tra nếu số đó có trong danh sách
        }
        return [];
    });
}

?>
