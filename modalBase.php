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
    global $conn, $presetData, $selected;
    getSelectedValue();

    echo "<form id='" . htmlspecialchars($field) . "' method='POST'>";

    // Lấy dữ liệu theo điều kiện
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
        foreach ($dataAll as $preset) {
            $data[] = $preset[$field] ?? '';
        }
    }

    // Loại bỏ phần tử trùng lặp
    $data = array_unique($data);

    // Nếu type là checkbox, ta cần lưu giá trị được chọn vào mảng
    $selectedValues = is_array($selected) ? $selected : [$selected];

    // Hiển thị radio hoặc checkbox
    foreach ($data as $value) {
        if (!empty($value)) {
            $value = preg_replace(['/\/n/', '/\/r/'], ["\n", "\r"], $value);
            $escapedValue = preg_replace('/\s+/', ' ', htmlspecialchars($value, ENT_QUOTES));

            // Nếu là checkbox, kiểm tra mảng giá trị
            if ($type === 'checkbox') {
                $isChecked = in_array($escapedValue, $selectedValues) ? 'checked' : '';
                $nameAttr = "nameInput[]";
            } else {
                $isChecked = $escapedValue == preg_replace('/\s+/', ' ', $selected) ? 'checked' : '';
                $nameAttr = "nameInput";
            }

            echo "<input style='margin:20px 0 0 20px; float: left;' type='$type' name='$nameAttr' value='$escapedValue'  onchange=\"updateText('$type')\">";
            echo "<span style='margin-left: 20px; float: left;'>$escapedValue</span><br style='clear: both;'><br>";

        }
    }
    echo '<div style="margin: 20px 0 0 20px; display: flex; align-items: center;">
    <input type="text" name='.htmlspecialchars($field).' id="mainInput" value="" style="width: 300px;">
</div>';


    echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
    echo "</form>";

    echo "<script>
    function updateText(type) {
        if (type == 'checkbox') {
            let checkboxes = document.querySelectorAll('input[name=\"nameInput[]\"]:checked');
            let selectedValues = Array.from(checkboxes).map(cb => cb.value).join('<br />');
            document.getElementById('mainInput').value = selectedValues;
        } else if (type == 'radio') {
            let selectedRadio = document.querySelector('input[name=\"nameInput\"]:checked');
            if (selectedRadio) {
                document.getElementById('mainInput').value = selectedRadio.value;
            }
        }
    }
</script>";

}

?>
