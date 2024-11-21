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
  margin-top: 3%;
  font-size: 15px;
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
.registerbtn {
  background: #009dff;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 30px;
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
  <?php
  if(ISSET($_POST["register"])){
    $email = $_POST["email"];
    $name = $_POST["name"];
    $pwd = $_POST["pwd"];
    $hp = $_POST["hp"];

    if(checkEmail($conn, $email)>0){
      echo '<script>alert("Registration failed!\nThis email is already registered!")</script>';
    }else{
      $password =  base64_decode($pwd);
      $sql = "INSERT INTO `user`(`email`, `username`, `password`,`hp`,`credit`,`status`) 
      VALUES ('$email','$name','$password' ,'$hp',0,1)";

      // echo ($sql);
      // echo $conn->query($sql)
      if($conn->query($sql)===TRUE){
        echo '<script>alert("Registration is done!\nPlease login!")</script>';
        header('Refresh:0;URL=login.php');
      }else{
        echo $sql;
        echo '<script>alert("Something went wrong")</script>';
      }
    }
  }
  ?>
  <div class="container" id="field">
    <h1 style="text-align:center">REGISTER</h1>
    <p style="text-align:center">PLEASE FILL IN THIS FORM TO CREATE AN ACCOUNT.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="name" id="name" required>

    <label for="hp"><b>No Tel</b></label>
    <input type="text" placeholder="Enter No Tel" name="hp" id="hp" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>


    <button type="submit" class="registerbtn" name="register">REGISTER</button>
  </div>

</form>

</body>
</html>
