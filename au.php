<?php
include("db.php");

$sub = $_GET["sub"];
$au = $_GET["au"];

$sql = "SELECT * FROM `au` WHERE '$sub' = `sub`";
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
        // var_dump($array);

        if(in_array($row["au"],$newArray)){
            echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='au' value='".$row['au']."'><span style='margin-left: 20px'>".$row['au']."</span><br><br>";
            $i++;
        }else{
            echo"<input style='margin:20px 0 0 20px' type='checkbox' name='au' value='".$row['au']."'><span style='margin-left: 20px'>".$row['au']."</span><br><br>";
        }
        
    }

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
