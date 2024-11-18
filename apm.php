<?php
include("db.php");

$sub = $_GET["sub"];
$apm = $_GET["apm"];

$sql = "SELECT * FROM `apm` WHERE '$sub' = `sub`";
$result = $conn->query($sql);

$array = explode(" ",$apm);

$newArray = array();

foreach ($array as $str) {
    $parts = preg_split('/<br>/', $str); 
    $newArray = array_merge($newArray, $parts); 
}
// echo("newArray");
// print_r($newArray);

echo "<form method='POST' id='apm'>";
    $i = 0;
    for($a=0; $a<$result->num_rows; $a++){
        $row = $result->fetch_assoc();
        // echo($row["apm"]);
        // var_dump($array);

        if(in_array($row["apm"],$newArray)){
            echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='apm' value='".$row['apm']."'><span style='margin-left: 20px'>".$row['apm']."</span><br><br>";
            $i++;
        }else{
            echo"<input style='margin:20px 0 0 20px' type='checkbox' name='apm' value='".$row['apm']."'><span style='margin-left: 20px'>".$row['apm']."</span><br><br>";
        }
        
    }

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
