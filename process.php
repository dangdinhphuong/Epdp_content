<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location: login.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="nav.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPDP</title>
    <style>
        .outbox{
            width: 90%;
            height: calc(100vh - 70px);
            margin: auto;
            margin-top: 50px;
        }
        .cal{
            width: 100%;
            height: 75%;
            background-color: gray;
            margin: auto;
        }

        a { text-decoration: none; }
        
    </style>
</head>
<body style="margin:20px 50px 0 50px;">
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn" id="hamburger" onclick='a()'>
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
        <br><br><br><hr>
    <div class="outbox">
        <h2>PROCESS</h2>
        <div class="cal" id='cal'>
            <?php
                include('calendar.php');
            ?>
        </div>
    </div>
    <script>
    let calendar = document.getElementById("cal");
    let checkbtn1 = document.getElementById("hamburger");
    function a(){
        if(calendar.style.display == "none"){
            calendar.style.display = "block";
        }else{
            calendar.style.display = "none";
        }
    }

</script>
</body>

</html>