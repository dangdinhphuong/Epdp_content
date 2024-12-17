<?php
include("db.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy dữ liệu từ session
$presetData = isset($_SESSION['preset_data']) ? $_SESSION['preset_data'] : [];
$sub = $_GET["sub"];
$au = $_GET["au"];

$sql = "SELECT * FROM `au` ";
$result = $conn->query($sql);

$array = explode(" ",$au);

$newArray = array();

foreach ($array as $str) {
    $parts = preg_split('/<br>/', $str); 
    $newArray = array_merge($newArray, $parts); 
}
// echo("newArray");
// print_r($newArray);

echo "<form method='POST' id='au'>";
    $i = 0;
    for($a=0; $a<$result->num_rows; $a++){
        $row = $result->fetch_assoc();
        // echo($row["au"]);
        $currentAu = $row['au'];

        // Kiểm tra nếu `kdg` hiện tại tồn tại trong mảng `preset_data`
        $found = false;
        foreach ($presetData as $preset) {
            if (isset($preset['au']) && strpos($preset['au'], $currentAu) !== false) {
                $found = true;
                break;
            }
        }


        if ($found) {
            if(in_array($row["au"],$newArray)){
                echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='au' value='".$row['au']."'><span style='margin-left: 20px'>".$row['au']."</span>";
                $i++;
            }else{
                echo"<input style='margin:20px 0 0 20px' type='checkbox' name='au' value='".$row['au']."'><span style='margin-left: 20px'>".$row['au']."</span>";
            }
            echo " <img src='./check-mark.png' style='width: 25px'>";
            echo "<br><br>";
        }

    }

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
