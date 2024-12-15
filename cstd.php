<?php
include("db.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy dữ liệu từ session
$presetData = isset($_SESSION['preset_data']) ? $_SESSION['preset_data'] : [];
$sub = $_GET["sub"];
$cstd = $_GET["cstd"];

$sql = "SELECT * FROM `cstd` ";
$result = $conn->query($sql);

$cstd = str_replace("<br>",",",$cstd);

$array = [];
if($cstd>0){
    $word='';
    for($i=0; $i<strlen($cstd); $i++){
        if($cstd[$i]==',' || $i==strlen($cstd)-1){
            if($i==strlen($cstd)-1){
                $word .= $cstd[$i];
            }
            array_push($array,$word);
            $word='';
            continue;
        }else{
            $word .= $cstd[$i];
        }
    }
}

echo "<form method='POST' id='cstd'>";
    $i = 0;
    for($a=0; $a<$result->num_rows; $a++){
        $row = $result->fetch_assoc();
        // echo($row["cstd"]);
        $currentCstd = $row['cstd'];

        // Kiểm tra nếu `kdg` hiện tại tồn tại trong mảng `preset_data`
        $found = false;
        foreach ($presetData as $preset) {
            if (isset($preset['cstd']) && strpos($preset['cstd'], $currentCstd) !== false) {
                $found = true;
                break;
            }
        }
       
        if(in_array($row["cstd"],$array)){
            echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='cstd' value='".$row['cstd']."'><span style='margin-left: 20px'>".$row['cstd']."</span>";
            $i++;
        }else{
            echo"<input style='margin:20px 0 0 20px' type='checkbox' name='cstd' value='".$row['cstd']."'><span style='margin-left: 20px'>".$row['cstd']."</span>";
        }
        if ($found) {
            echo " <img src='./check-mark.png' style='width: 25px'>";
        }
        echo "<br><br>";
    }

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
