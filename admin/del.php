<?php
    include('../db.php');
    $id = $_GET["id"];
    //print_r($_GET);

    $sql = "DELETE FROM `user` WHERE id = '$id'";

    if($conn->query($sql)===TRUE){
        header("Location:user.php");
    }else{
        echo '<script>alert("Failed to delete")</script>';
        echo $conn->error;
    }

?>