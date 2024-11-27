<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location: login.php");
}
?>
<?php
    include 'db.php';
$sql = "SELECT * FROM `subjects` WHERE `status` = 1  ";
$result = $conn->query($sql);

// Khởi tạo mảng để chứa các bản ghi
$subjects = [];

while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;  // Thêm bản ghi vào mảng
}
?>

<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="style.css" type="text/css">
<link rel="stylesheet" href="nav.css" type="text/css">
<link rel="stylesheet" href="table.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<title>MyPDP</title>
<style>
    .table-content {
        /* width: 900px; */
        text-align: center;
    }
    .table-header {
        text-align: center;
        font-weight: bold;
        background-color: white;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }
    td{
        width:80px;
        height: 40px;
    }
    .center{
        text-align: center;
    }
    #collapsetable{
        border-collapse: collapse;
        border: 3px solid black;
        text-align: center;
        /* margin-left: 0px; */
        width: 100%;
    }
    .btn{
        padding: 10px 20px 10px 20px;
        background: #009dff;
        color: white;
        border: none;
        margin-right: 55px;
    }
    a { text-decoration: none; }

    #window_new {
        padding: 16px;
        background-color: #ededed;
        width: 800px;
        margin: auto;
        margin-top: -8%;
        margin-left: 20%;
        font-size: 15px;
        display: none;
        position: absolute;
        text-align: center;
    }

    .close{
        width: 30px;
        height: 23px;
        /* background-color: red; */
        float: right;
        cursor: default;
    }

    .group{ 
        display: block;
        /* float: left; */
        margin-left: 65px;
        position:relative; 
        margin-bottom:30px; 
    }
    
</style>   
</head>
    <body style="margin:20px 50px 0 50px;">
         
    <?php //include ("nav.php");?>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn" id="hamburger">
            &#9776;
        </label>
        <label class="logo">MyPDP</label>
        <ul class="ul">
            <li><?php echo $_COOKIE["username"];?></li>
            <li><a href="period.php">SETTING</a></li>
            <li><a href="process.php">PROCESS</a></li>
            <li><a href="print.php">PRINT</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>

        <br><br><br><hr><br>
        <h2>SETTING PERIOD</h2>
        <form action="" method="POST">
        <h3 style="margin: 5px 5px 0 0; float: left;">CHOOSE DAY:</h3>
            <select style=" width:300px; height:30px; border-radius: 10px" name="day">
                <option value='nn'>--- CHOOSE DAY ---</option>
                <option value='0'>SUNDAY</option>
                <option value='1'>MONDAY</option>
                <option value='2'>TUESDAY</option>
                <option value='3'>WEDNESDAY</option>
                <option value='4'>THURSDAY</option>
                <option value='5'>FRIDAY</option>
                <option value='6'>SATURDAY</option>
            </select><br>  <br>
            <div>
                <button class="btn" name="submit">SUBMIT</button>
            </div>
            <br>
            <div id="search" style="margin: -80px 80px 0 0; float:right">
                <input style="width:250px; height:30px; border-radius: 10px" type="text" name="search">
                <button style="width:65px; height:30px; border-radius: 10px" name="searchbtn" ><i class="fa-solid fa-magnifying-glass fa-lg"></i></button><br>
            </div>
        </form>

        
        <?php
          if(ISSET($_POST["submit"])){
                if($_POST['day']=='nn'){
                    echo "<script>alert('Please select the day.')</script>";
                }else{
                    // $_SESSION["day"] = $_POST["day"];
                    setcookie("day",$_POST['day'],time()+(86400));
                    // echo $_COOKIE["day"];
                    header("Location:period.php");
                }
            }
        ?>
        <div>
        <h3 style="float: left">DAY: <span style="color: red">
        <?php 
        $day = $_COOKIE["day"];
        // echo $day;
        if($day==0){
            $day="SUNDAY"; 
        }elseif($day==1){
            $day="MONDAY";
        }elseif($day==2){
            $day="TUESDAY";
        }elseif($day==3){
            $day="WEDNESDAY";
        }elseif($day==4){
            $day="THURSDAY";
        }elseif($day==5){
            $day="FRIDAY";
        }else{
            $day="SATURDAY";
        }
        echo $day;
        ?>
        </span></h3>
        <a class="btn" style="float: right" id="add"><span>ADD NEW PERIOD</span></a>
        
        </div>

        <br>
        <div id="window_new">
        <div class="close" id="close">&nbsp; &#10006;</div>
        <h1>ADD NEW PERIOD</h1>
        <?php
        //   echo $_SESSION['id'];
        if(ISSET($_POST["insert"])){
            $std = $_POST["std"];
            $class = $_POST["class"];
            $noStu = $_POST["noStu"];
            $sub = $_POST["sub"];
            $start = $_POST["start"];
            $end = $_POST["end"];
            $day = $_COOKIE["day"];
            $id = $_COOKIE["id"];

            $sql = "INSERT INTO `period`(`userid`, `day`, `std`, `sub`, `class`, `start`, `end`, `noStu`) 
            VALUES ('$id','$day','$std','$sub','$class','$start','$end','$noStu')";

                if($conn->query($sql)===TRUE){
                    // echo "<span class='succWrap' style='color:green; margin-left:8px;'>SUCCESS TO ADD NEW PERIOD!</span>";
                    // print_r($sql);
                    echo "<script>window.location.replace('period.php');</script>";
                }else{
                    //print_r($sql);
                    echo "<span class='errorWrap' style='color:red; margin-left:8px;'>FAIL TO ADD NEW PERIOD!</span>";
                }
            }

        ?>
        
        <form action="" method="POST">
            <table>
                <tr>
                <td>
                    <div class="group">      
                    <h3 style="margin-top: 25px">STANDARD:</h3>
                </td>
                <td class="fill">
                    <select style="width:200px; height:25px" name="std">
                        <?php
                            for($a=1;$a<=12;$a++){
                                echo"<option value='$a'>$a</option>";
                            }
                        ?>
                    </select><br>
                    </div>
                </td>
        
                <td class="break">
                    <div class="group">      
                    <h3 style="margin-top: 25px">CLASS:</h3>
                </td>
                <td class="fill">
                    <input style="height:28px" type="text" id="class" name="class" value="" required><br>
                    </div>
                </td>
                </tr>

                <tr>
                <td class="break">
                    <div class="group">    
                    <h3>STUDENT NUMBER:</h3>
                </td>
                <td class="fill">
                    <input style="height:28px" type="text" id="noStu" name="noStu" value="" required><br>
                    </div>
                </td>
        
                <td class="break">
                    <div class="group">     
                    <h3 style="margin-top: 25px">SUBJECT:</h3>
                </td>
                <td class="fill">
                    <select style="width:200px; height:28px" name="sub">
                        <?php
                        foreach ($subjects as $subject) {
                            echo "<option value=\"{$subject['name']}\">{$subject['name']}</option>";
                        }
                        ?>
                    </select><br>  
                    </div>
                </td>
                </tr>

                <tr>
                <td class="break">
                    <div class="group"> 
                    <h3 style="margin-top: 25px">START:</h3>
                </td>
                <td class="fill">
                    <input style="height:28px" step="60" type="time" id="start" name="start" value="" required><br>
                    </div>
                </td>
        
                <td class="break">
                    <div class="group">      
                    <h3 style="margin-top: 25px">END:</h3>
                </td>
                <td class="fill">
                    <input style="height:28px" step="60" type="time" id="end" name="end" value="" required><br>
                    </div>
                </td>
                </tr>
            </table>

                <div>
                <button type="submit" class="btn" name="insert">SUBMIT</button>
                </div>
                
            </form>
        </div>
        
        <br>
    <div class="table-content">
        <table id="collapsetable" class="collapsetable" border="1">
            <thead>
                <tr class="table-header">
                    <td>STANDARD</td>
                    <td>SUBJECT</td>
                    <td>CLASS</td>
                    <td>START</td>
                    <td>END</td>
                    <td>STUDENT NUMBER</td>
                    <td>ACTION</td>
                </tr>
            </thead>
            <tbody>
            <?php
                $day = $_COOKIE['day'];
                $id = $_COOKIE['id'];
                $sql = "SELECT * FROM `period` JOIN `user` ON period.userid = user.id WHERE userid = '$id' AND `day` = '$day' ORDER BY `std` ";
                
                if(ISSET($_POST["searchbtn"])){
                    $search = $_POST["search"];
                    // $id = $_SESSION["id"];
                    if($search==NULL || $search==" "){
                        $sql = "SELECT * FROM `period`
                        WHERE `userId`= $id AND `day` = $day ORDER BY `std` ";
                        // echo $sql;
                    }else{
                        $sql = "SELECT * FROM `period`
                        WHERE `userId`= $id AND `day` = $day 
                        AND `sub` LIKE '%$search%' OR `class` LIKE '%$search%' OR `start` LIKE '%$search%' OR 
                        `end` LIKE '%$search%' OR `noStu` LIKE '%$search%' ORDER BY `std` ";
                        // echo $sql; 
                    }
                }

                $result = $conn->query($sql);
                // $count = 1;
                if($result->num_rows == 0){
                    echo "<script>alert('No record.')</script>";
                }
                while($row = $result->fetch_assoc()){
                    // print_r($result->num_rows);
                    // echo "<br>";
                    // echo ($sql) ; 
                    // echo $row["userId"];   
                    
            ?>
            <tr class="center">
                <?php //print_r($result)?>
                <!-- <td><?php //echo $row["date"]."-".$row["month"]."-".date('Y'); ?></td> -->
                <td><?php echo $row["std"]; ?></td>
                <td><?php echo $row["sub"];?></td>
                <td><?php echo $row["class"];?></td>
                <td><?php echo $row["start"];?></td>
                <td><?php echo $row["end"];?></td>
                <td><?php echo $row["noStu"];?></td>
                <td><a style="margin: auto; padding: 7px;" class="btn" onclick="return confirm('Are you sure to delete the period?')" href="del.php?id=<?php echo $row['no']?>">DELETE</a></td>
                
                <?php
                    }
                ?>
             
            </tbody>
        </table>
        </div>
        <br>

    </body>

    <script>
        let add = document.getElementById('add');
        let window_new = document.getElementById('window_new');
        add.onclick = function(){
            window_new.style.display = 'block';
        }

        let close = document.getElementById('close');
        close.onclick = function(){
            window_new.style.display = 'none';
        }
    </script>
</html>