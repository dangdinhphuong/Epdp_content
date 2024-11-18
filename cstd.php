<?php
include("db.php");

$sub = $_GET["sub"];
$cstd = $_GET["cstd"];

$sql = "SELECT * FROM `cstd` WHERE '$sub' = `sub`";
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
        // var_dump($array);
       
        if(in_array($row["cstd"],$array)){
            echo"<input style='margin:20px 0 0 20px' checked type='checkbox' name='cstd' value='".$row['cstd']."'><span style='margin-left: 20px'>".$row['cstd']."</span><br><br>";
            $i++;
        }else{
            echo"<input style='margin:20px 0 0 20px' type='checkbox' name='cstd' value='".$row['cstd']."'><span style='margin-left: 20px'>".$row['cstd']."</span><br><br>";
        }
        
    }

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
