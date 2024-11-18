<?php
    session_start();
    include('../db.php');
    var_dump($_SESSION["test"]);
    $test = $_SESSION["test"];
    for($i=1; $i<count($test); $i++){   
            $email = $test[$i][0];
            $username = $test[$i][1];
            $hp = $test[$i][2];
            $credit = $test[$i][3];
            $status = $test[$i][4]; 
            
            if(preg_match("/^active/i", $status)){
                $status = 1;
            }else{
                $status = 2;
            }

            if(checkEmail($conn, $email)>0){
                $sql = "SELECT * FROM `user`";
            }else{
                $sql = "INSERT INTO `user`(`email`, `username`, `password`,`hp`,`credit`,`status`) 
                VALUES ('$email','$username',PASSWORD('0000'),'$hp','$credit','$status')";
                $conn->query($sql);
                echo "<br>".$sql."<br>";
            }
            
    }
    if($sql==TRUE){
        echo '<script>alert("Added user successfully")</script>';
        header('Refresh:0;URL=user.php');
    }else{
        // echo $sql;
        echo '<script>alert("Something went wrong")</script>';
    }

?>