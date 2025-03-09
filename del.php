<?php
    include('db.php');
    $id = $_GET["id"];
    //print_r($_GET);

    $sql = "DELETE FROM `period` WHERE `no` = '$id'";

    if($conn->query($sql)===TRUE){
        header("Location:period.php");
    }else{
        echo "Fail to delete, ".$conn->error;
    }

?>