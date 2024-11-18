<?php
include("db.php");

$sub = $_GET["sub"];
$kk = $_GET["kk"];

$sql = "SELECT * FROM `kk` WHERE '$sub' = `sub`";
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
        // var_dump($array);

        if(in_array($row["kk"],$newArray)){
            echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='kk' value='".$row['kk']."'><span style='margin-left: 20px'>".$row['kk']."</span><br><br>";
            $i++;
        }else{
            echo"<input style='margin:20px 0 0 20px' type='checkbox' name='kk' value='".$row['kk']."'><span style='margin-left: 20px'>".$row['kk']."</span><br><br>";
        }
        
    }

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
