<?php
    setcookie("id","",time()-30);
    setcookie("username","",time()-30);
    setcookie("day","",time()-30);

    header("Location:login.php");

?>