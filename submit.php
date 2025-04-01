<?php
    session_start();
    include "db.php";

    // echo ($_SERVER["REQUEST_METHOD"]);
    $ans = $_GET["ans"];
    $penggal = $_GET["penggal"];
    $minggu = $_GET["minggu"];
    $year = $_GET["year"];
    $month = $_GET["month"];
    $date = $_GET["date"];
    $day = $_GET["day"];
    $input = $_GET["input"];
    $cnt = $_GET["cnt"];
    // $cid = $_SESSION["cid"];
    $id = $_SESSION["id"];
    

    echo $ans."<br>".$input."<br>".$cnt."<br>";
    date_default_timezone_set('asia/kuala_lumpur');
    $cDate = date("Y-m-d");
    $cTime = date("H:i:s");

    $pd = $date.$month.$year;
    $pDate = strtotime($pd);

    // $sql = "INSERT INTO `calendar`(`userId`,`year`, `month`, `date`, `day`,`cTime`,`cDate`,`pDate`,`minggu`,`penggal`) 
    // VALUES ('$id','$year','$month','$date','$day','$cTime','$cDate','$pDate','$minggu','$penggal') ";
    // $conn->query($sql);

    // $sql2 = "SELECT * FROM `calendar` WHERE `pDate` = '$pDate'";
    // $result2 = $conn->query($sql2);
    // $row2 = $result2->fetch_assoc();
    // $cid = $row2["id"];

    $final=[];
    $array = [];
    if($ans>0){
        $word='';
        for($i=0;$i<strlen($ans);++$i){
            if($ans[$i]==',' || $i==strlen($ans)-1){
                if($i==strlen($ans)-1){
                    $word .= $ans[$i];
                }
                array_push($final,$word);
                $word='';
                continue;
            }else{
                $word .= $ans[$i];
            }
        }
    }
    echo "<br>";
    var_dump($final);
    echo "<br>";
    echo (count($final)); 
    echo "<br>";

    $count = 0;
    $sub = [];
    for($i=0;$i<count($final);$i++){
        array_push($sub,$final[$i]);
        if($count>=25){
            array_push($array,$sub);
            $sub = [];
            $count = -1;
        }
        $count++;
    }
    var_dump($array);
    // echo "<br>";
    // echo(count($array)); 
    echo $array[0][25];

    for ($j = 0; $j < count($array); $j++) {
        $preset = $array[$j][0];
        $tema = $array[$j][1];
        $tajuk = $array[$j][2];
        $kdg = $array[$j][3];
        $cstd = $array[$j][4];
        $op = $array[$j][5];
        $kk = $array[$j][6];
        $apm = $array[$j][7];
        $au = $array[$j][8];
        $apn = $array[$j][9];
        $emk = $array[$j][10];
        $nilai = $array[$j][11];
        $bbm = $array[$j][12];
        $pemikiran = $array[$j][13];
        $peta = $array[$j][14];
        $pbd = $array[$j][15];
        $tahap = $array[$j][16];
        $akt21 = $array[$j][17];
        $p21 = $array[$j][18];
        $praujian = $array[$j][19];
        $pascaujian = $array[$j][20];
        $k6 = $array[$j][21];
        $aspirasi = $array[$j][22];
        $refleksi = $array[$j][23];
        $tsm = $array[$j][24];
        $pid = $array[$j][25];

        echo $pid."<br>";
        echo"store"."<br>";

        // $sql1 = "INSERT INTO `content`
        // (`calId`, `userId`, `periodId`, `date`, `month`, `year`, `day`, `penggal`, `minggu`, `preset`, `tema`, `tajuk`, `kdg`, `cstd`, `op`, `kk`, `apm`, `au`, 
        // `apn`, `emk`, `nilai`, `bbm`, `pemikiran`, `peta`, `pbd`, `tahap`, `akt21`, `p21`, `praujian`, `pascaujian`, `k6`, `aspirasi`, `refleksi`, `inputRef`, `tsm`) 
        // VALUES ('$cid','$id','$pid','$date','$month','$year','$day','$penggal','$minggu','$preset','$tema','$tajuk','$kdg','$cstd','$op','$kk','$apm','$au',
        // '$apn','$emk','$nilai','$bbm','$pemikiran','$peta','$pbd','$tahap','$akt21','$p21','$praujian','$pascaujian','$k6','$aspirasi','$refleksi','$input','$tsm')";
        // $conn->query($sql1); 
    }
    
    // if($sql1==TRUE){
    //     $sql3 = "UPDATE `user` SET `credit`=`credit`+1 WHERE `id` = '$id' ";
    //     $conn->query($sql3);
    //     echo '<script>alert("Submit Successfully")</script>';
    //     header('Refresh:0;URL=process.php');
    // }else{
    //     echo '<script>alert("Something went wrong")</script>';
    // }

?>