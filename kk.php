<?php
include("db.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy dữ liệu từ session
$presetData = isset($_SESSION['preset_data']) ? $_SESSION['preset_data'] : [];

$sub = $_GET["sub"];
$kk = $_GET["kk"];

$sql = "SELECT * FROM `kk`";
$result = $conn->query($sql);

$array = explode(" ", $kk);

$newArray = [];
foreach ($array as $str) {
    $parts = preg_split('/<br>/', $str);
    $newArray = array_merge($newArray, $parts);
}

echo "<form method='POST' id='kk'>";
$i = 0;
for ($a = 0; $a < $result->num_rows; $a++) {
    $row = $result->fetch_assoc();
    $currentKk = $row['kk'];

    // Kiểm tra nếu `kk` hiện tại tồn tại trong mảng `preset_data`
    $found = false;
    foreach ($presetData as $preset) {
        if (isset($preset['kk']) && strpos($preset['kk'], $currentKk) !== false) {
            $found = true;
            break;
        }
    }

    // Kiểm tra nếu giá trị tồn tại trong `newArray`
    if (in_array($currentKk, $newArray)) {
        echo "<input style='margin:20px 0 0 20px' checked type='checkbox' name='kk[]' value='" . htmlspecialchars($currentKk) . "'>";
        echo "<span style='margin-left: 20px'>" . htmlspecialchars($currentKk) . "</span>";
        $i++;
    } else {
        echo "<input style='margin:20px 0 0 20px' type='checkbox' name='kk[]' value='" . htmlspecialchars($currentKk) . "'>";
        echo "<span style='margin-left: 20px'>" . htmlspecialchars($currentKk) . "</span>";
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
