<?php
include("db.php");

$sub = $_GET["sub"];
$sql = "SELECT  `tema` FROM `preset`";
$result = $conn->query($sql);

echo "<form id='tema'>";
for($a=0;$a<$result->num_rows;$a++){
    $row = $result->fetch_assoc();
    echo"<input style='margin:20px 0 0 20px' type='radio' name='tema' value='".$row['tema']."'><span style='margin-left: 20px'>".$row['tema']."</span><br><br>";
}

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
