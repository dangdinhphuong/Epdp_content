<?php
include("db.php");

$sub = $_GET["sub"];
$apn = $_GET["apn"];

$sql = "SELECT * FROM `apn` WHERE '$sub' = `sub`";
$result = $conn->query($sql);

$array = explode(" ",$apn);

$newArray = array();

foreach ($array as $str) {
    $parts = preg_split('/<br>/', $str); 
    $newArray = array_merge($newArray, $parts); 
}
// echo("newArray");
// print_r($newArray);

echo "<form method='POST' id='apn'>";
    $i = 0;
    for($a=0; $a<$result->num_rows; $a++){
        $row = $result->fetch_assoc();
        // echo($row["apn"]);
        // var_dump($array);

        if(in_array($row["apn"],$newArray)){
            echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='apn' value='".$row['apn']."'><span style='margin-left: 20px'>".$row['apn']."</span><br><br>";
            $i++;
        }else{
            echo"<input style='margin:20px 0 0 20px' type='checkbox' name='apn' value='".$row['apn']."'><span style='margin-left: 20px'>".$row['apn']."</span><br><br>";
        }
        
    }

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
