<?php
include("db.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy dữ liệu từ session
$presetData = isset($_SESSION['preset_data']) ? $_SESSION['preset_data'] : [];
$sub = $_GET["sub"];
$op = $_GET["op"];

$sql = "SELECT * FROM `op`";
$result = $conn->query($sql);

$array = explode(" ", $op);

$newArray = [];
foreach ($array as $str) {
    $parts = preg_split('/<br>/', $str);
    $newArray = array_merge($newArray, $parts);
}

echo "<form method='POST' id='op'>";
$i = 0;
for ($a = 0; $a < $result->num_rows; $a++) {
    $row = $result->fetch_assoc();
    $currentOp = $row['op'];

    // Kiểm tra nếu `op` hiện tại tồn tại trong mảng `preset_data`
    $found = false;
    foreach ($presetData as $preset) {
        if (isset($preset['op']) && strpos($preset['op'], $currentOp) !== false) {
            $found = true;
            break;
        }
    }

    // Kiểm tra nếu giá trị tồn tại trong `newArray`
    if (in_array($currentOp, $newArray)) {
        echo "<input style='margin:20px 0 0 20px' checked type='checkbox' name='op[]' value='" . htmlspecialchars($currentOp) . "'>";
        echo "<span style='margin-left: 20px'>" . htmlspecialchars($currentOp) . "</span>";
        $i++;
    } else {
        echo "<input style='margin:20px 0 0 20px' type='checkbox' name='op[]' value='" . htmlspecialchars($currentOp) . "'>";
        echo "<span style='margin-left: 20px'>" . htmlspecialchars($currentOp) . "</span>";
    }

    // Hiển thị biểu tượng check mark nếu giá trị tồn tại trong `presetData`
    if ($found) {
        echo " <img src='./check-mark.png' style='width: 25px'>";
    }
    echo "<br><br>";
}

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";
?>
