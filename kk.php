<?php
include("db.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy dữ liệu từ session
$presetData = isset($_SESSION['preset_data']) ? $_SESSION['preset_data'] : [];

$sub = $_GET["sub"];
$kk = $_GET["kk"];

$sql = "SELECT * FROM `kk` ";
$result = $conn->query($sql);

$array = explode(" ",$kk);

$newArray = array();

foreach ($array as $str) {
    $parts = preg_split('/<br>/', $str);
    $newArray = array_merge($newArray, $parts);
}
// echo("newArray");
// print_r($newArray);

echo "<form method='POST' id='kk'>";
$i = 0;
for($a=0; $a<$result->num_rows; $a++){
    $row = $result->fetch_assoc();
    // echo($row["kk"]);
    $currentKk = $row['kk'];

    // Kiểm tra nếu `kdg` hiện tại tồn tại trong mảng `preset_data`
    $found = false;
    foreach ($presetData as $preset) {
        if (isset($preset['kk']) && strpos($preset['kk'], $currentKk) !== false) {
            $found = true;
            break;
        }
    }

    if(in_array($row["kk"],$newArray)){
        echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='kk' value='".$row['kk']."'><span style='margin-left: 20px'>".$row['kk']."</span>";
        $i++;
    }else{
        echo"<input style='margin:20px 0 0 20px' type='checkbox' name='kk' value='".$row['kk']."'>
<span style='margin-left: 20px'>".$row['kk']."</span>";
    }
    if ($found) {
        echo " <img src='./check-mark.png' style='width: 25px'>";
    }
    echo "<br><br>";
}

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
