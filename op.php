<?php
include("db.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy dữ liệu từ session
$presetData = isset($_SESSION['preset_data']) ? $_SESSION['preset_data'] : [];

$sub = $_GET["sub"];
$op = $_GET["op"];

$sql = "SELECT * FROM `op` ";
$result = $conn->query($sql);

$array = explode(" ",$op);

$newArray = array();

foreach ($array as $str) {
    $parts = preg_split('/<br>/', $str);
    $newArray = array_merge($newArray, $parts);
}



echo "<form method='POST' id='op'>";
$i = 0;
for($a=0; $a<$result->num_rows; $a++){
    $row = $result->fetch_assoc();

    $currentOp = $row['op'];

    // Kiểm tra nếu `kdg` hiện tại tồn tại trong mảng `preset_data`
    $found = false;
    foreach ($presetData as $preset) {
        if (isset($preset['op']) && strpos($preset['op'], $currentOp) !== false) {
            $found = true;
            break;
        }
    }



    if(in_array($row["op"],$newArray)){
        echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='op' value='".$row['op']."'><span style='margin-left: 20px'>".$row['op']."</span>
";
        $i++;
    }else{
        echo"<input style='margin:20px 0 0 20px' type='checkbox' name='op' value='".$row['op']."'><span style='margin-left: 20px'>".$row['op']."</span>";
    }
    if ($found) {
        echo " <img src='./check-mark.png' style='width: 25px'>";
    }
    echo "<br><br>";
}

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
