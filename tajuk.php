<?php
include("db.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy dữ liệu từ session
$presetData = isset($_SESSION['preset_data']) ? $_SESSION['preset_data'] : [];
$tema = $_GET["tema"];
$sql = "SELECT DISTINCT `tajuk` FROM `preset` WHERE '$tema' = `tema` ";
$result = $conn->query($sql);

echo "<form method='POST' id='tajuk'>";

// Lặp qua từng `tajuk` trong kết quả truy vấn
for ($a = 0; $a < $result->num_rows; $a++) {
    $row = $result->fetch_assoc();
    $currentTajuk = $row['tajuk'];

    // Kiểm tra nếu `tajuk` hiện tại tồn tại trong mảng `preset_data`
    $found = false;
    foreach ($presetData as $preset) {
        if ($preset['tajuk'] === $currentTajuk) {
            $found = true;
            break;
        }
    }

    // In ra radio button và trạng thái
    echo "<input style='margin:20px 0 0 20px' type='radio' name='tajuk' value='" . htmlspecialchars($currentTajuk) . "'>";
    echo "<span style='margin-left: 20px'>" . htmlspecialchars($currentTajuk) . "</span>";
    if ($found) {
        echo " <img src='./check-mark.png' style='width: 25px'>";
    }
    echo "<br><br>";
}

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";
?>
