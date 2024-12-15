<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || empty($_COOKIE['username']) || $_SESSION['user']['role'] != 1) {
    header("Location: login.php");
}
?>
<b style="float:left; font-size:35px">MyPDP</b>

<p style="float:right">

<span class="nav"><a href="print.php">PRINT</a></span> 
<span class="nav"><a href="process.php">PROCESS</a></span> 
<span class="nav"><a href="period.php">SETTING</a></span> 
<span class="nav"><?php echo $_SESSION["username"]?></span>
<span class="nav"><a href="logout.php">LOGOUT</a></span> 


</p>
<style>
    .nav{
        font-size: 18px;
        margin-right: 30px;
        text-transform: uppercase;
    }
</style>