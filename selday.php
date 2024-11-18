<?php
    // session_start();
    include 'db.php';
?>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="style.css" type="text/css">
<title>MyPDP</title>
<style>
    .table-content {
        width: 1000px;
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
    .collapsetable{
        border-collapse: collapse;
        border: 3px solid black;
        text-align: center;
        margin-left: 60px;
        width: 150%;
    }
    .btn{
        padding: 10px 20px 10px 20px;
        background: #009dff;
        color: white;
        border: none;
        margin-right: 55px;
    } 

    a { text-decoration: none; }

    
</style>   
</head>
    <body style="margin:50px 50px 0 50px;">
        <?php
            // include("nav.php");
        ?>
        <b style="font-size:35px">MyPDP</b>
        <span style="float: right; margin-right: 20px; font-size: 20px;"><a href="logout.php">LOGOUT</a></span> 
        <span style="font-size:20px; text-transform: uppercase; float: right; margin-right: 20px"><?php echo $_COOKIE["username"] ?></span>
        <br><br><br><hr><br>
        <h2>SETTING PERIOD</h2>
        <form action="" method="POST">
        <h3>CHOOSE DAY:</h3>
            <select style="width:300px; height:30px; border-radius: 10px" name="day">
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
        </form>

        <?php
            // echo $_SESSION["id"];

            if(ISSET($_POST["submit"])){
                // $_SESSION["day"] = $_POST["day"];
                setcookie("day",$_POST['day'],time()+(86400));
                // echo $_SESSION["day"];
                header("Location:period.php");   
            }
        ?>
        
        <br>        
        

    </body>
</html>