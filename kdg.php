<?php
include("db.php");

$sub = $_GET["sub"];
$kdg = $_GET["kdg"];

$sql = "SELECT * FROM `kdg` ";
$result = $conn->query($sql);
// echo $kdg;
$kdg = str_replace("<br>",",",$kdg);

$array = [];
if($kdg>0){
    $word='';
    for($i=0; $i<strlen($kdg); $i++){
        if($kdg[$i]==',' || $i==strlen($kdg)-1){
            if($i==strlen($kdg)-1){
                $word .= $kdg[$i];
            }
            array_push($array,$word);
            $word='';
            continue;
        }else{
            $word .= $kdg[$i];
        }
    }
}

echo "<form method='POST' id='kdg'>";
    $i = 0;
    for($a=0; $a<$result->num_rows; $a++){
        $row = $result->fetch_assoc();
        // echo($row["kdg"]);
        // var_dump($array);

        if(in_array($row["kdg"],$array)){
            echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='kdg' value='".$row['kdg']."'><span style='margin-left: 20px'>".$row['kdg']."</span><br><br>";
            $i++;
        }else{
            echo"<input style='margin:20px 0 0 20px' type='checkbox' name='kdg' value='".$row['kdg']."'><span style='margin-left: 20px'>".$row['kdg']."</span><br><br>";
        }
        
    }

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
