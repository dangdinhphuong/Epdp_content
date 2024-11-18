<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css">
<title>MyPDP</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: #DADBDD;
  width: 800px;
  margin: auto;
  /* margin-top: 5%; */
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.btn {
  background: #009dff;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  font-size: 15px;
}

.btn:hover {
  opacity: 1;
}
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 50px;
}
label{
  text-transform: uppercase;
}
</style>
</head>
<body>
<?php include 'header.php';?>
<?php include 'db.php';?>
<form action="" method="POST">
  <div class="container" id="field">
    <h1 style="text-align:center">RESET PASSWORD</h1>
    <hr>
    <?php
    if(ISSET($_POST["submit"])){
        //get and set the input from user
        $email=$_POST['email'];
        $pwd = $_POST["pwd"];
        $npwd = $_POST["npwd"];
        $name = $_POST["name"];

        if(checkEmailName($conn, $email, $name)>0){
            if($pwd == $npwd){
                $sql ="SELECT * FROM user WHERE email= '$email' AND `username` = '$name'";
                echo $sql;
                // $result = $conn->query($sql);
    
                    if($conn->query($sql)==TRUE){
                    $sql1 = "UPDATE `user` SET `password`= PASSWORD('$pwd') WHERE `email`='$email' ";                        
                    $conn->query($sql1);
                    echo '<script>alert("Your password successfully changed");</script>';
                    header("Refresh:0;URL=login.php");
                    }else{
                    echo '<script>alert("Email address or username is invalid");</script>';
                        // echo $conn->error;
                    }
            }else{
                echo '<script>alert("New Password and Confirm Password do not match !!!");</script>';
            }
        }else{
            echo '<script>alert("Email address or username is invalid");</script>';
        }

    }
  ?>
    <!-- <hr> -->

    <label for="email"><b>EMAIL</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="name"><b>USERNAME</b></label>
    <input type="text" placeholder="Enter Username" name="name" id="name" required>

    <label for="password"><b>NEW PASSWORD</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

    <label for="npassword"><b>CONFIRM PASSWORD</b></label>
    <input type="password" placeholder="Enter Confirm Password" name="npwd" id="npwd" required>

    <hr>

    <button type="submit" class="btn" name="submit">SUBMIT</button>
  </div>

</form>

</body>
</html>
