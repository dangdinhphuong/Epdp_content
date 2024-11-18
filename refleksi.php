<?php
include("db.php");

$sub = $_GET["sub"];
$refleksi = $_GET["refleksi"];

$sql = "SELECT * FROM `refleksi` WHERE '$sub' = `sub`";
$result = $conn->query($sql);

$array = explode(" ",$refleksi);
// print_r($array);
$newArray = array();

foreach ($array as $str) {
    $parts = preg_split('/<br>/', $str); 
    $newArray = array_merge($newArray, $parts); 
}
// echo("newArray");
// print_r($newArray);

echo "<form method='POST' id='refleksi'>";
    $i = 0;
    for($a=0; $a<$result->num_rows; $a++){
        $row = $result->fetch_assoc();
        // echo($row["refleksi"]);
        // var_dump($array);

        if(in_array($row["refleksi"],$newArray)){
            echo"<input style='margin:20px 0 0 20px' checked type='radio' name='refleksi' value='".$row['input'].$row['refleksi']."'><span style='margin-left: 20px'>".$row['refleksi']."</span><br><br>";
            $i++;
        }else{
            echo"<input style='margin:20px 0 0 20px' type='radio' name='refleksi' value='".$row['input'].$row['refleksi']."'><span style='margin-left: 20px'>".$row['refleksi']."</span><br><br>";
        }
        
    }

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
