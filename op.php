<?php
include("db.php");

$sub = $_GET["sub"];
$op = $_GET["op"];

$sql = "SELECT * FROM `op` ";
$result = $conn->query($sql);
// echo "op".$op;
// echo(gettype($op));
$array = explode(" ",$op);

$newArray = array();

foreach ($array as $str) {
    $parts = preg_split('/<br>/', $str); 
    $newArray = array_merge($newArray, $parts); 
}
// echo("newArray");
// print_r($newArray);


echo "<form method='POST' id='op'>";
    $i = 0;
    for($a=0; $a<$result->num_rows; $a++){
        $row = $result->fetch_assoc();
        // echo($row["op"]);
        // var_dump($array);

        // if($row["op"] == $newArray){
        //     var_dump($newArray);
        // }

        if(in_array($row["op"],$newArray)){
            echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='op' value='".$row['op']."'><span style='margin-left: 20px'>".$row['op']."</span><br><br>";
            $i++;
        }else{
            echo"<input style='margin:20px 0 0 20px' type='checkbox' name='op' value='".$row['op']."'><span style='margin-left: 20px'>".$row['op']."</span><br><br>";
        }
        
    }

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
