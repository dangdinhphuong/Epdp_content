<?php 

$conn = new mysqli("de1tmi3t63foh7fa.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","g2nmtk4tmxw1arle","dqdt4m07aujlte3y", "n54b9y7jlhlgdgd6");

function checkEmail($conn, $email){
    $sql = "SELECT * from user WHERE email = '$email'";

    $result = $conn->query($sql);
    // var_dump($result);
    return $result->num_rows;

}
function checkSubject($conn, $subject, $id = null){
    if(!empty($id)){
        $sql = "SELECT * from subjects WHERE name = '$subject' and id != $id";

    }else{
        $sql = "SELECT * from subjects WHERE name = '$subject'";
    }
    $result = $conn->query($sql);
    return $result->num_rows;

}

function checkEmailName($conn, $email, $name){
    $sql1 = "SELECT * from user WHERE email = '$email' AND `username` = '$name'";

    $result = $conn->query($sql1);
    // var_dump($result);
    return $result->num_rows;

}

?>