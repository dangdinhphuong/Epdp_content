<?php

    include("db.php");
    
    $tajuk = $_REQUEST['tajuk'];

    $sql = "SELECT * FROM preset WHERE tajuk='".$tajuk."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Encode array into json format
    echo json_encode($row);

?>