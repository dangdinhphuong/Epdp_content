<?php
include("db.php");

$tema = $_GET["tema"];
$sql = "SELECT DISTINCT `tajuk` FROM `preset` WHERE '$tema' = `tema` ";
$result = $conn->query($sql);

echo "<form method='POST' id='tajuk'>";
for($a=0;$a<$result->num_rows;$a++){
    $row = $result->fetch_assoc();
    echo"<input style='margin:20px 0 0 20px' type='radio' name='tajuk' value='".$row['tajuk']."'><span style='margin-left: 20px'>".$row['tajuk']."</span><br><br>";
}

echo "<input style='margin:10px 0 10px 20px' name='submit' type='submit' value='SUBMIT'>";
echo "</form>";

?>
